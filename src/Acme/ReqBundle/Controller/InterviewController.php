<?php

namespace Acme\ReqBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\ModelBundle\Model\Interview\InterviewGetter;
use Acme\ModelBundle\Model\Interview\InterviewGetterWrapper;

/**   
 * @author Andrea Fiori
 * @since  22 October 2014
 */
class InterviewController extends Controller
{
    const perPage = 15;
    
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $em = $this->get('doctrine.orm.entity_manager');
        
        $wrapper = new InterviewGetterWrapper( new InterviewGetter($em) );
        $wrapper->setInput( array() );
        $wrapper->setupQueryBuilder();
        
        $pagination = $this->get('knp_paginator')->paginate(
            $wrapper->getObjectGetter()->getQuery(),
            $this->get('request')->query->get('page', 1),
            self::perPage
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
