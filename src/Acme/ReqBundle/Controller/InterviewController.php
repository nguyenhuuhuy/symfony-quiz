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

    public function topicListAction(Request $request, $topic)
    {
        $em = $this->get('doctrine.orm.entity_manager');

        $important      = $request->get('important');
        $currentTopic   = $request->get('topic');
        $currentTag     = $request->get('tag');

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

        return $this->render('::default/interviews/topic.html.twig', array(
            'pagination'    => $pagination,
            'records'       => $records,
            'important'     => $important,
            'topics'        => $this->findTopics(),
            'currentTopic'  => $currentTopic,
            'currentTag'    => $currentTag
        ));
    }

    /**
     * From a tag slug, select related interview questions
     *
     * @param Request $request
     * @param string $tag
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function tagListAction(Request $request, $tag)
    {
        $em = $this->get('doctrine.orm.entity_manager');

        $important = $request->get('important');

        $wrapper = new InterviewTagsGetterWrapper( new InterviewTagsGetter($em) );
        $wrapper->setInput(array(
            'fields'        => 'DISTINCT(q.id) AS questionId, q.question, q.answer',
            'tagSlug'       => $tag,
            'important'     => $important
        ));
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
                'questionId'    => $paging['questionId'],
            ));
            $wrapper->setupQueryBuilder();

            $tagRecords = $wrapper->getRecords();
            if (!empty($tagRecords)){
                $paging['tags'] = $tagRecords;
            }

            $records[] = $paging;
        }

        return $this->render('::default/interviews/tag.html.twig', array(
            'pagination'    => $pagination,
            'records'       => $records,
            'important'     => $important,
            'currentTag'    => $tag,
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
