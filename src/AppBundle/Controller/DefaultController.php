<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use ModelBundle\Model\Quiz\QuizQuestionsTopicsGetter;
use ModelBundle\Model\Topics\TopicsGetter;
use ModelBundle\Model\Topics\TopicsGetterWrapper;
use ModelBundle\Model\Topics\TopicsTreeSetup;
use ModelBundle\Model\Quiz\QuizTagsGetter;
use ModelBundle\Model\Quiz\QuizTagsGetterWrapper;
use ModelBundle\Model\Interview\InterviewTopicsGetter;
use ModelBundle\Model\Interview\InterviewTagsGetter;
use ModelBundle\Model\Interview\InterviewTagsGetterWrapper;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     *
     * @Method("GET")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $topicsGetterWrapper = new TopicsGetterWrapper( new QuizQuestionsTopicsGetter($em) );
        $topicsGetterWrapper->setupQueryBuilder();
        $topicsGetterWrapper->setInput( array() );

        $quizTagsGetterWrapper = new QuizTagsGetterWrapper( new QuizTagsGetter($em) );
        $quizTagsGetterWrapper->setInput( array(
            'fields' => 'DISTINCT(qtr.tag) AS tagId, qt.id, qt.name',
            'orderBy' => 'qt.name ASC'
        ));
        $quizTagsGetterWrapper->setupQueryBuilder();

        $topicsTreeSetup = new TopicsTreeSetup();
        $topicsTreeSetup->setTopicsGetterWrapper(new TopicsGetterWrapper( new TopicsGetter($em)));
        $topicsTreeSetup->setupTopicsFromDb(array(

        ));
        $topicsTreeSetup->setupRecordsTree();

        $interviewTopicsGetter = new TopicsGetterWrapper( new InterviewTopicsGetter($em) );
        $interviewTopicsGetter->setInput( array() );
        $interviewTopicsGetter->setupQueryBuilder();

        $interviewTagsGetterWrapper = new InterviewTagsGetterWrapper( new InterviewTagsGetter($em) );
        $interviewTagsGetterWrapper->setInput(array(
            'fields' => 'DISTINCT(t.id) AS tagId, t.name, t.slug',
            'orderBy' => 't.name ASC'
        ));
        $interviewTagsGetterWrapper->setupQueryBuilder();

        return $this->render('frontend/default/index.html.twig', array(
            'quizTopicsRecords'  => $topicsGetterWrapper->getRecords(),
            'quizTags'           => $quizTagsGetterWrapper->getRecords(),
            'interviewTopics'    => $interviewTopicsGetter->getRecords(),
            'interviewTags'      => $interviewTagsGetterWrapper->getRecords(),
            'topicsTree'         => $topicsTreeSetup->getRecordsTree(),
        ));
    }
}
