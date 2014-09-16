<?php

namespace Acme\QuizBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuestionsTagsRelations
 */
class QuestionsTagsRelations
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Acme\QuizBundle\Entity\Topics
     */
    private $topic;

    /**
     * @var \Acme\QuizBundle\Entity\Questions
     */
    private $question;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set topic
     *
     * @param \Acme\QuizBundle\Entity\Topics $topic
     * @return QuestionsTagsRelations
     */
    public function setTopic(\Acme\QuizBundle\Entity\Topics $topic = null)
    {
        $this->topic = $topic;

        return $this;
    }

    /**
     * Get topic
     *
     * @return \Acme\QuizBundle\Entity\Topics 
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Set question
     *
     * @param \Acme\QuizBundle\Entity\Questions $question
     * @return QuestionsTagsRelations
     */
    public function setQuestion(\Acme\QuizBundle\Entity\Questions $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \Acme\QuizBundle\Entity\Questions 
     */
    public function getQuestion()
    {
        return $this->question;
    }
}
