<?php

namespace Acme\ReqBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Acme\ReqBundle\Model\Topics\TopicsGetter;
use Acme\ReqBundle\Model\Topics\TopicsGetterWrapper;
use Acme\ReqBundle\Model\Topics\TopicsTreeSetup;
use Acme\ReqBundle\Model\Quiz\QuizAnswersGetterWrapper;
use Acme\ReqBundle\Model\Quiz\QuizAnswersGetter;
use Acme\ReqBundle\Model\Quiz\QuizQuestionsGetter;
use Acme\ReqBundle\Model\Quiz\QuizQuestionsGetterWrapper;
use Acme\ReqBundle\Model\Quiz\QuizTagsGetter;
use Acme\ReqBundle\Model\Quiz\QuizTagsGetterWrapper;
use Acme\ReqBundle\Model\Interview\InterviewGetter;
use Acme\ReqBundle\Model\Interview\InterviewGetterWrapper;
use Acme\ReqBundle\Model\EntitySerializer;

/**
 * TODO: routing problem with 2 words and all must be minuscolo..., index setup, interviews
 * 
 * @author Andrea Fiori
 * @since  04 June 2014
 */
class DefaultController extends Controller
{
    /** @var \Doctrine\ORM\EntityManager **/
    private $em;
    
    /**
     * @param Request $request
     * @return type
     */
    public function indexAction(Request $request)
    {
        $this->em = $this->get('doctrine.orm.entity_manager');
        $topic    = $request->get('topic');
        $tag      = $request->get('tag');
        
        if (!$topic) {
            $topicsTreeSetup = new TopicsTreeSetup();
            $topicsTreeSetup->setTopicsGetterWrapper(new TopicsGetterWrapper( new TopicsGetter($this->em)));
            $topicsTreeSetup->setupTopicsFromDb( array() );
            $topicsTreeSetup->setupRecordsTree();
            
            $quizTagsGetterWrapper = new QuizTagsGetterWrapper( new QuizTagsGetter($this->em) );
            $quizTagsGetterWrapper->setInput( array('fields' => 'DISTINCT(qt.id) AS id, qt.name') ); 
            $quizTagsGetterWrapper->setupQueryBuilder();
            
            return $this->render('AcmeReqBundle:Default:index.html.twig', array(
                'topics'             => $topicsTreeSetup->getRecords(),
                'topicsRecordsIndex' => $topicsTreeSetup->getRecordsIndex(),
                'topicsRecordsTree'  => $topicsTreeSetup->getRecordsTree(),
                'level'              => 0,
                'tagcloud'           => $quizTagsGetterWrapper->getRecords()
            ));
        }
        
        if (!$tag) {
            $questionsQueryGetter = new QuizQuestionsGetterWrapper( new QuizQuestionsGetter($this->em) );
            $questionsQueryGetter->setInput( array('topicName' => $topic) );
            $questionsQueryGetter->setupQueryBuilder();

            $pagination = $this->get('knp_paginator')->paginate(
                $questionsQueryGetter->getObjectGetter()->getQuery(),
                $this->get('request')->query->get('page', 1), // page number
                5 // limit per page
            );

            $qa_records = $this->_attachAnswers($pagination);

            return $this->render('AcmeReqBundle:Default:questions.html.twig', array(
                'pagination' => $pagination, // pagination object with page properties
                'qa'         => $qa_records
            ));
        }
    }
    
    public function interviewAction()
    {
        $em = $this->get('doctrine.orm.entity_manager');
        
        $interviewGetterWrapper = new InterviewGetterWrapper( new InterviewGetter($em) );
        $interviewGetterWrapper->setInput( array() );
        $interviewGetterWrapper->setupQueryBuilder();
        
        $pagination = $this->get('knp_paginator')->paginate(
            $questionsQueryGetter->getObjectGetter()->getQuery(),
            $this->get('request')->query->get('page', 1), // page number
            5 // limit per page
        );
        
        return $this->render('AcmeReqBundle:Default:interview.html.twig', array(
            // 'interviewRecords' => $interviewGetterWrapper->getRecords()
        ));
    }

        /**
         * Set all answers for each questions
         * 
         * @param object $pagination
         * @return array|false
         */
        private function _attachAnswers($pagination)
        {
            $arrayAnswers = array();
            
            $answersGetterWrapper = new QuizAnswersGetterWrapper( new QuizAnswersGetter($this->em) );
            
            foreach($pagination as $paging) {

                $answersGetterWrapper->setInput( array( "questionId" => $paging->getId() ) );
                $answersGetterWrapper->setupQueryBuilder();

                $paging->answers = $answersGetterWrapper->getRecords();
                
                $tagsGetterWrapper = new QuizTagsGetterWrapper( new QuizTagsGetter($this->em) );
                $tagsGetterWrapper->setInput( array( "questionId" => $paging->getId() ) );
                $tagsGetterWrapper->setupQueryBuilder();
                
                $records = $tagsGetterWrapper->getRecords();
                if ($records) {
                    $paging->tags = $records;
                }
                
                $arrayAnswers[] = $paging;
            }

            return $arrayAnswers;
        }

}
