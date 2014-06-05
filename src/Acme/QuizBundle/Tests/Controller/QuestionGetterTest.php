<?php

namespace Acme\QuizBundle\Tests\Model;

use Acme\QuizBundle\Tests\Model\TestSuite;

/**
 * @author Andrea Fiori
 * @since  05 June 2014
 */
class AnswersGetter
{
    private $entityManager;
    
    private $queryBuilder;
    
    private $limitPerPage = 5;
    
    /**
     * @param \Doctrine\ORM\EntityManager $entityManager
     */
    public function __construct(\Doctrine\ORM\EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        
        $this->queryBuilder = $this->entityManager->createQueryBuilder();
    }
    
    public function getAnswers(Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination $pagination)
    {
        $answersObjects = array();
        foreach($pagination as $paging) {
            $this->queryBuilder->add('select', 'qa.id, qa.answer, qa.correct, IDENTITY(qa.question) AS questionId')
                               ->add('from', 'Acme\QuizBundle\Entity\QuizAnswers qa ')
                               ->where("qa.question = '".$paging->getId()."' ");

            $answers = $this->queryBuilder->getQuery()->getResult();

            $paging->answers = $answers;
        }

        return $answersObjects;
    }
}


class DefaultControllerTest extends TestSuite
{
    public function testGetQuestions()
    {
        
    }
}