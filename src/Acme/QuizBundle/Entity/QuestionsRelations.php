<?php

namespace Acme\QuizBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuestionsRelations
 */
class QuestionsRelations
{
    /**
     * @var integer
     */
    private $questionId;

    /**
     * @var integer
     */
    private $topicId;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set questionId
     *
     * @param integer $questionId
     * @return QuestionsRelations
     */
    public function setQuestionId($questionId)
    {
        $this->questionId = $questionId;

        return $this;
    }

    /**
     * Get questionId
     *
     * @return integer 
     */
    public function getQuestionId()
    {
        return $this->questionId;
    }

    /**
     * Set topicId
     *
     * @param integer $topicId
     * @return QuestionsRelations
     */
    public function setTopicId($topicId)
    {
        $this->topicId = $topicId;

        return $this;
    }

    /**
     * Get topicId
     *
     * @return integer 
     */
    public function getTopicId()
    {
        return $this->topicId;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
