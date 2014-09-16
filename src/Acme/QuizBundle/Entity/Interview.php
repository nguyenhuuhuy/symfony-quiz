<?php

namespace Acme\QuizBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Interview
 */
class Interview
{
    /**
     * @var string
     */
    private $question;

    /**
     * @var string
     */
    private $topics;

    /**
     * @var string
     */
    private $answer;

    /**
     * @var integer
     */
    private $position;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set question
     *
     * @param string $question
     * @return Interview
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string 
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set topics
     *
     * @param string $topics
     * @return Interview
     */
    public function setTopics($topics)
    {
        $this->topics = $topics;

        return $this;
    }

    /**
     * Get topics
     *
     * @return string 
     */
    public function getTopics()
    {
        return $this->topics;
    }

    /**
     * Set answer
     *
     * @param string $answer
     * @return Interview
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return string 
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Interview
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
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
