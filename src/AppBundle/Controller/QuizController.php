<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use ModelBundle\Model\Quiz\QuizQuestionsGetter;
use ModelBundle\Model\Quiz\QuizQuestionsGetterWrapper;
use ModelBundle\Model\Quiz\QuizAnswersGetterWrapper;
use ModelBundle\Model\Quiz\QuizAnswersGetter;
use ModelBundle\Model\Quiz\QuizTagsGetter;
use ModelBundle\Model\Quiz\QuizTagsGetterWrapper;
use ModelBundle\Model\Quiz\QuizSetupQuestionGetterWrapper;
use ModelBundle\Model\EntitySerializer;
use ModelBundle\Model\Quiz\QuizPaginationRecordHelper;

/**
 * Quiz list Frontend Controller
 */
class QuizController extends Controller
{
    const perPage = 50;
    
    /**
     * @Route("/quiz", name="quiz")
     * @Route("/quiz/topic/{topic}", name="quiz_topic", requirements={"topic": "[a-zA-Z0-9-_/]+", "_method": "GET"})
     * @Route("/quiz/tags/{tag}", name="quiz_tags", requirements={"tag": "[a-zA-Z0-9-_/]+", "_method": "GET"})
     *
     * @Method("GET")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $em     = $this->getDoctrine()->getManager();
        $topic  = $request->get('topic');
        $tag    = $request->get('tag');

        $wrapper = new QuizSetupQuestionGetterWrapper($em);
        $wrapper->setTopic($topic);
        $wrapper->setTag($tag);
        $wrapper->setupObjectWrapper();
        $wrapper->setupObjectWrapperInput();
        $wrapper->setupObjectWrapperQueryBuilder();

        $pagination = $this->get('knp_paginator')->paginate(
            $wrapper->getObjectWrapper()->getObjectGetter()->getQuery(),
            $request->query->get('page', 1),
            self::perPage
        );

        $entitySerializer = new EntitySerializer($em);

        $recordsArray = array();
        foreach($pagination as $paging) {
            $quizPaginationRecordHelper = new QuizPaginationRecordHelper($paging);
            $quizPaginationRecordHelper->setupQuestion($entitySerializer->toArray($paging->getQuestion()));
            $quizPaginationRecordHelper->setupAnswers(new QuizAnswersGetterWrapper(new QuizAnswersGetter($em)));
            $quizPaginationRecordHelper->setupTopics(new QuizQuestionsGetterWrapper(new QuizQuestionsGetter($em)));
            $quizPaginationRecordHelper->formatTopicsRecords();
            $quizPaginationRecordHelper->setupTags(new QuizTagsGetterWrapper(new QuizTagsGetter($em)));
            $quizPaginationRecordHelper->formatTagsRecords();
            
            $recordsArray[] = $quizPaginationRecordHelper->getRecord();
        }

        return $this->render('frontend/quiz/quiz_questions.html.twig', array(
            'pagination' => $pagination,
            'qa'         => $recordsArray
        ));
    }
}