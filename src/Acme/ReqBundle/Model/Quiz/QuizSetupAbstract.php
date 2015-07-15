<?php

namespace Acme\ReqBundle\Model\Quiz;

/**
 * @author Andrea Fiori
 * @since  04 November 2014
 */
abstract class QuizSetupAbstract
{
    protected $entityManager;
    
    protected $topic;
    
    protected $tag;
    
    /**
     * @param \Doctrine\ORM\EntityManager $entityManager
     */
    public function __construct(\Doctrine\ORM\EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    /**
     * @param string $topic
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;
    }

    /**
     * @param string $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
        
        return $this->tag;
    }
    
    /**
     * @return \Doctrine\ORM\EntityManager $entityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    public function getTopic()
    {
        return $this->topic;
    }

    public function getTag()
    {
        return $this->tag;
    }
}