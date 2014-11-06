<?php

namespace Acme\ReqBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\ReqBundle\Model\Interview\InterviewGetter;
use Acme\ReqBundle\Model\Interview\InterviewGetterWrapper;

/**   
 * @author Andrea Fiori
 * @since  22 October 2014
 */
class InterviewController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $em = $this->get('doctrine.orm.entity_manager');
        
        $interviewGetterWrapper = new InterviewGetterWrapper( new InterviewGetter($em) );
        $interviewGetterWrapper->setInput( array() );
        $interviewGetterWrapper->setupQueryBuilder();
        
        $pagination = $this->get('knp_paginator')->paginate(
            $interviewGetterWrapper->getObjectGetter()->getQuery(),
            $this->get('request')->query->get('page', 1),
            15
        );
        
        $records = array();
        foreach($pagination as $paging) {
            $records[] = $paging;
        }
        
        return $this->render('AcmeReqBundle:Default:interview.html.twig', array(
            'pagination' => $pagination,
            'records'    => $records
        ));
    }
}
