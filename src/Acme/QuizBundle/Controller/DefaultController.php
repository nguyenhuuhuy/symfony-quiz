<?php

namespace Acme\QuizBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @author Andrea Fiori
 * @since  04 June 2014
 */
class DefaultController extends Controller
{
    public function indexAction()
    {
        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT qq FROM AcmeQuizBundle:QuizQuestions qq ";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator'); 
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1), // page number,
            5 // limit per page
        );

        if ($pagination) {
            $answersObjects = array();
            foreach($pagination as $paging) {
                $qb = $this->getDoctrine()->getManager()->createQueryBuilder();
                $qb->add('select', 'qa.id, qa.answer, qa.correct, IDENTITY(qa.question) AS questionId')
                   ->add('from', 'Acme\QuizBundle\Entity\QuizAnswers qa ')
                   ->where("qa.question = '".$paging->getId()."' ");
                
                $answers = $qb->getQuery()->getResult();
                
                $paging->answers = $answers;
                
                $arrayAnswers[] = $paging;
            } 
        }
        
        return $this->render('AcmeQuizBundle:Default:index.html.twig', array('pagination' => $pagination, 'qa' => $arrayAnswers));
    }
}
