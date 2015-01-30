<?php

namespace Acme\ReqBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\ModelBundle\Model\Interview\InterviewGetter;
use Acme\ModelBundle\Model\Interview\InterviewGetterWrapper;
use Acme\ModelBundle\Model\Interview\InterviewTagsGetter;
use Acme\ModelBundle\Model\Interview\InterviewTagsGetterWrapper;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class InterviewController
 *
 * @package Acme\ReqBundle\Controller
 *
 * @author Andrea Fiori
 * @since  22 October 2014
 */
class InterviewController extends Controller
{
    /**
     * List topics and tags
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $em = $this->get('doctrine.orm.entity_manager');

        $wrapper = new InterviewTagsGetterWrapper( new InterviewTagsGetter($em) );
        $wrapper->setInput(array(
            'fields' => 'DISTINCT(t.id) AS tagId, t.name, t.slug'
        ));
        $wrapper->setupQueryBuilder();

        return $this->render('::default/interviews/index.html.twig', array(
            'topics' => $this->findTopics(),
            'tags'   => $wrapper->getRecords()
        ));
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');

        $important      = $request->query->get('important');
        $currentTopic   = $request->get('topic');
        $currentTag     =  $request->get('tag');

        $wrapper = new InterviewGetterWrapper( new InterviewGetter($em) );
        $wrapper->setInput( array(
                'important' => $important,
                'orderBy'   => 'q.position'
            )
        );
        $wrapper->setupQueryBuilder();

        $pagination = $this->get('knp_paginator')->paginate(
            $wrapper->getObjectGetter()->getQuery(),
            $this->get('request')->query->get('page', 1),
            12
        );

        $records = array();
        foreach($pagination as $paging) {

            $wrapper = new InterviewTagsGetterWrapper( new InterviewTagsGetter($em) );
            $wrapper->setInput(array(
                'fields'        => 'DISTINCT(t.id) AS tagId, t.name, t.slug',
                'questionId'    => $paging->getQuestion()->getId(),

            ));
            $wrapper->setupQueryBuilder();
            $tagRecords = $wrapper->getRecords();
            if (!empty($tagRecords)){
                $paging->tags = $tagRecords;
            }

            $records[] = $paging;
        }

        return $this->render('::default/interviews/list.html.twig', array(
            'pagination'    => $pagination,
            'records'       => $records,
            'important'     => $important,
            'topics'        => $this->findTopics(),
            'currentTopic'  => $currentTopic,
            'currentTag'    => $currentTag
        ));
    }

        /**
         * Get distinct topic list
         *
         * @return \Acme\ModelBundle\Model\QueryBuilderHelperAbstract
         */
        private function findTopics()
        {
            $em = $this->get('doctrine.orm.entity_manager');

            $wrapper = new InterviewGetterWrapper( new InterviewGetter($em) );
            $wrapper->setInput( array(
                    'fields' => 'DISTINCT( ir.topic) AS idTopic, t.id, t.name, t.slug'
                )
            );
            $wrapper->setupQueryBuilder();

            return $wrapper->getRecords();
        }
}
