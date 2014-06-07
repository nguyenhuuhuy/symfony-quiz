<?php

namespace Acme\QuizBundle\Model\Questions;

/**
 * @author Andrea Fiori
 * @since  06 June 2014
 */
class QuestionsQueryGetter
{
    protected $entityManager;

    /**
     * @param \Doctrine\ORM\EntityManager $entityManager
     */
    public function __construct(\Doctrine\ORM\EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    /**
     * get a main query for pagination. Don't need to set a query builder for now
     */
    public function getQuery()
    {
        return $this->entityManager->createQuery("SELECT qq FROM AcmeQuizBundle:QuizQuestions qq ");
    }
}
