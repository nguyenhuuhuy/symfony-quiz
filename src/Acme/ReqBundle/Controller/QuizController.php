<?php

namespace Acme\ReqBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Acme\ModelBundle\Model\Quiz\QuizQuestionsGetter;
use Acme\ModelBundle\Model\Quiz\QuizQuestionsGetterWrapper;
use Acme\ModelBundle\Model\Quiz\QuizAnswersGetterWrapper;
use Acme\ModelBundle\Model\Quiz\QuizAnswersGetter;
use Acme\ModelBundle\Model\Quiz\QuizTagsGetter;
use Acme\ModelBundle\Model\Quiz\QuizTagsGetterWrapper;
use Acme\ModelBundle\Model\Quiz\QuizSetupQuestionGetterWrapper;
use Acme\ModelBundle\Model\EntitySerializer;
use Acme\ModelBundle\Model\Quiz\QuizPaginationRecordHelper;

/**
 * @author Andrea Fiori
 * @since  22 October 2014
 */
class QuizController extends Controller
{
    const perPage = 5;
    
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $topic    = $request->get('topic');
        $tag      = $request->get('tag');
        
        $wrapper = new QuizSetupQuestionGetterWrapper($em);
        $wrapper->setTopic($topic);
        $wrapper->setTag($tag);
        $wrapper->setupObjectWrapper();
        $wrapper->setupObjectWrapperInput();
        $wrapper->setupObjectWrapperQueryBuilder();

        $pagination = $this->get('knp_paginator')->paginate(
            $wrapper->getObjectWrapper()->getObjectGetter()->getQuery(),
            $this->get('request')->query->get('page', 1),
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

        return $this->render('::default/quiz_questions.html.twig', array(
            'pagination' => $pagination,
            'qa'         => $recordsArray
        ));
    }
}