<?php

namespace Acme\ReqBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Acme\ReqBundle\Model\Quiz\QuizAnswersGetterWrapper;
use Acme\ReqBundle\Model\Quiz\QuizAnswersGetter;
use Acme\ReqBundle\Model\Quiz\QuizQuestionsGetter;
use Acme\ReqBundle\Model\Quiz\QuizQuestionsGetterWrapper;
use Acme\ReqBundle\Model\Quiz\QuizTagsGetter;
use Acme\ReqBundle\Model\Quiz\QuizTagsGetterWrapper;

/**   
 * @author Andrea Fiori
 * @since  22 October 2014
 */
class QuizController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $topic    = $request->get('topic');
        $tag      = $request->get('tag');

        if (!$tag) {
            $questionsQueryGetter = new QuizQuestionsGetterWrapper( new QuizQuestionsGetter($em) );
            $questionsQueryGetter->setInput( array('topicName' => $topic) );
            $questionsQueryGetter->setupQueryBuilder();

            $pagination = $this->get('knp_paginator')->paginate(
                $questionsQueryGetter->getObjectGetter()->getQuery(),
                $this->get('request')->query->get('page', 1), // page number
                5 // limit per page
            );

            
            $arrayAnswers = array();

            $answersGetterWrapper = new QuizAnswersGetterWrapper( new QuizAnswersGetter($em) );
            
            foreach($pagination as $paging) {

                $answersGetterWrapper->setInput( array( "questionId" => $paging->getId() ) );
                $answersGetterWrapper->setupQueryBuilder();

                $paging->answers = $answersGetterWrapper->getRecords();
                
                $tagsGetterWrapper = new QuizTagsGetterWrapper( new QuizTagsGetter($em) );
                $tagsGetterWrapper->setInput( array( "questionId" => $paging->getId() ) );
                $tagsGetterWrapper->setupQueryBuilder();
                
                $records = $tagsGetterWrapper->getRecords();
                if ($records) {
                    $paging->tags = $records;
                }
                
                $arrayAnswers[] = $paging;
            }

            return $this->render('AcmeReqBundle:Default:quiz_questions.html.twig', array(
                'pagination' => $pagination, // pagination object with page properties
                'qa'         => $arrayAnswers
            ));
        }
    }
}