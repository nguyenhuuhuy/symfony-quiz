<?php

namespace Acme\QuizBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Answers
 */
class Answers
{
    /**
     * @var string
     */
    private $answer;

    /**
     * @var string
     */
    private $correct;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Acme\QuizBundle\Entity\Questions
     */
    private $question;


    /**
     * Set answer
     *
     * @param string $answer
     * @return Answers
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
     * Set correct
     *
     * @param string $correct
     * @return Answers
     */
    public function setCorrect($correct)
    {
        $this->correct = $correct;

        return $this;
    }

    /**
     * Get correct
     *
     * @return string 
     */
    public function getCorrect()
    {
        return $this->correct;
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

    /**
     * Set question
     *
     * @param \Acme\QuizBundle\Entity\Questions $question
     * @return Answers
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
