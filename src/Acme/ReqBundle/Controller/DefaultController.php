<?php

namespace Acme\ReqBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Acme\ReqBundle\Model\Quiz\QuizQuestionsTopicsGetter;
use Acme\ReqBundle\Model\Topics\TopicsGetter;
use Acme\ReqBundle\Model\Topics\TopicsGetterWrapper;
use Acme\ReqBundle\Model\Topics\TopicsTreeSetup;
use Acme\ReqBundle\Model\Quiz\QuizTagsGetter;
use Acme\ReqBundle\Model\Quiz\QuizTagsGetterWrapper;
use Acme\ReqBundle\Model\Interview\InterviewTopicsGetter;
use Acme\ReqBundle\Model\Interview\InterviewTagsGetter;
use Acme\ReqBundle\Model\Interview\InterviewTagsGetterWrapper;

/**    
 * @author Andrea Fiori
 * @since  04 June 2014
 */
class DefaultController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        
        $topicsGetterWrapper = new TopicsGetterWrapper( new QuizQuestionsTopicsGetter($em) );
        $topicsGetterWrapper->setupQueryBuilder();
        $topicsGetterWrapper->setInput( array() );

        $quizTagsGetterWrapper = new QuizTagsGetterWrapper( new QuizTagsGetter($em) );
        $quizTagsGetterWrapper->setInput( array('fields' => 'DISTINCT(qt.id) AS id, qt.name') );
        $quizTagsGetterWrapper->setupQueryBuilder();
        
        $topicsTreeSetup = new TopicsTreeSetup();
        $topicsTreeSetup->setTopicsGetterWrapper(new TopicsGetterWrapper( new TopicsGetter($em)));
        $topicsTreeSetup->setupTopicsFromDb( array() );
        $topicsTreeSetup->setupRecordsTree();
        
        $interviewTopicsGetter = new TopicsGetterWrapper( new InterviewTopicsGetter($em) );
        $interviewTopicsGetter->setupQueryBuilder();
        $interviewTopicsGetter->setInput( array() );
        
        $interviewTagsGetterWrapper = new InterviewTagsGetterWrapper( new InterviewTagsGetter($em) );
        $interviewTagsGetterWrapper->setInput( array() );
        $interviewTagsGetterWrapper->setupQueryBuilder();
        
        return $this->render('AcmeReqBundle:Default:index.html.twig', array(
            'quizTopicsRecords'  => $topicsGetterWrapper->getRecords(),
            'quizTags'           => $quizTagsGetterWrapper->getRecords(),
            'interviewTopics'    => $interviewTopicsGetter->getRecords(),
            'interviewTags'      => $interviewTagsGetterWrapper->getRecords(),
            'topicsTree'         => $topicsTreeSetup->getRecordsTree(),
        ));
    }
}
