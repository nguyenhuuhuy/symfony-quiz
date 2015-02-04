<?php

namespace Acme\ReqBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Acme\ModelBundle\Model\Interview\InterviewGetter;
use Acme\ModelBundle\Model\Interview\InterviewGetterWrapper;
use Acme\ModelBundle\Model\Interview\InterviewTagsGetter;
use Acme\ModelBundle\Model\Interview\InterviewTagsGetterWrapper;

/**
 * Class InterviewTopicsController
 */
class InterviewTopicsController extends Controller
{
    /**
     * List question interview topics
     *
     * @param Request $request
     * @param $topic
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function topicListAction(Request $request, $topic)
    {
        $em = $this->get('doctrine.orm.entity_manager');

        $important      = $request->get('important');

        $wrapper = new InterviewGetterWrapper( new InterviewGetter($em) );
        $wrapper->setInput( array(
                'important' => $important,
                'orderBy'   => 'q.position'
            )
        );
        $wrapper->setupQueryBuilder();

        /** @var \Knp\Component\Pager\Paginator $pagination */
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
            'currentTopic'  => $request->get('topic'),
            'currentTag'    => $request->get('tag')
        ));
    }
}