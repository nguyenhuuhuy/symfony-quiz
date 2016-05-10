<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ModelBundle\Model\Interview\InterviewGetter;
use ModelBundle\Model\Interview\InterviewGetterWrapper;
use ModelBundle\Model\Interview\InterviewTagsGetter;
use ModelBundle\Model\Interview\InterviewTagsGetterWrapper;
use Symfony\Component\HttpFoundation\Request;

/**
 * Interview Frontend Controller
 */
class InterviewController extends Controller
{
    /**
     * List topics and tags
     *
     * @Route("/interview", name="interview")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $wrapper = new InterviewTagsGetterWrapper( new InterviewTagsGetter($em) );
        $wrapper->setInput(array(
            'fields' => 'DISTINCT(t.id) AS tagId, q.id AS questionId, q.question, q.answer, t.name AS topicName, t.slug'
        ));
        $wrapper->setupQueryBuilder();

        $pagination = $this->get('knp_paginator')->paginate(
            $wrapper->getObjectGetter()->getQuery(),
            $request->query->get('page', 1),
            8
        );

        return $this->render('frontend/interview/interview.html.twig', array(
            'pagination'    => $pagination,
            'topics'        => $this->findTopics(),
            'records'       => $wrapper->getRecords(),
        ));
    }

    /**
     * From a tag slug, select related interview questions
     *
     * @Route("/interview/tags/{tag}", name="interview_tags", requirements={"tag": "[a-zA-Z0-9-_/]+", "_method": "GET"})
     *
     * @param Request $request
     * @param string $tag
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function tagListAction(Request $request, $tag)
    {
        $em = $this->getDoctrine()->getManager();

        $important = $request->get('important');

        $wrapper = new InterviewTagsGetterWrapper( new InterviewTagsGetter($em) );
        $wrapper->setInput(array(
            'fields'        => 'DISTINCT(q.id) AS questionId, q.question, q.answer',
            'tagSlug'       => $tag,
            'important'     => $important
        ));
        $wrapper->setupQueryBuilder();

        /**
         * @var \Knp\Component\Pager\Paginator $pagination
         */
        $pagination = $this->get('knp_paginator')->paginate(
            $wrapper->getObjectGetter()->getQuery(),
            $request->query->get('page', 1),
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

        return $this->render('frontend/interview/tag.html.twig', array(
            'pagination'    => $pagination,
            'records'       => $records,
            'important'     => $important,
            'currentTag'    => $tag,
        ));
    }

        /**
         * Get distinct topic list
         *
         * @return \ModelBundle\Model\QueryBuilderHelperAbstract
         */
        private function findTopics()
        {
            $wrapper = new InterviewGetterWrapper( new InterviewGetter($this->getDoctrine()->getManager()) );
            $wrapper->setInput( array(
                'fields' => 'DISTINCT( ir.topic) AS idTopic, t.id, t.name, t.slug'
            ));
            $wrapper->setupQueryBuilder();

            return $wrapper->getRecords();
        }
}
