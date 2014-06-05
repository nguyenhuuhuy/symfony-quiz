<?php

namespace Acme\QuizBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuizAnswers
 */
class QuizAnswers
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
     * @var \Acme\QuizBundle\Entity\QuizQuestions
     */
    private $question;


    /**
     * Set answer
     *
     * @param string $answer
     * @return QuizAnswers
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
     * @return QuizAnswers
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
     * @param \Acme\QuizBundle\Entity\QuizQuestions $question
     * @return QuizAnswers
     */
    public function setQuestion(\Acme\QuizBundle\Entity\QuizQuestions $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \Acme\QuizBundle\Entity\QuizQuestions 
     */
    public function getQuestion()
    {
        return $this->question;
    }
}
