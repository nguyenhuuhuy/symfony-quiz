<?php

namespace Acme\ReqBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuizQuestions
 *
 * @ORM\Table(name="quiz_questions")
 * @ORM\Entity
 */
class QuizQuestions
{
    /**
     * @var string
     *
     * @ORM\Column(name="question", type="text", nullable=true)
     */
    private $question;

    /**
     * @var string
     *
     * @ORM\Column(name="question_code", type="text", nullable=true)
     */
    private $questionCode;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;

    /**
     * @var integer
     *
     * @ORM\Column(name="number_correct_answers", type="bigint", nullable=true)
     */
    private $numberCorrectAnswers;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set question
     *
     * @param string $question
     * @return QuizQuestions
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
     * Set questionCode
     *
     * @param string $questionCode
     * @return QuizQuestions
     */
    public function setQuestionCode($questionCode)
    {
        $this->questionCode = $questionCode;

        return $this;
    }

    /**
     * Get questionCode
     *
     * @return string 
     */
    public function getQuestionCode()
    {
        return $this->questionCode;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return QuizQuestions
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set numberCorrectAnswers
     *
     * @param integer $numberCorrectAnswers
     * @return QuizQuestions
     */
    public function setNumberCorrectAnswers($numberCorrectAnswers)
    {
        $this->numberCorrectAnswers = $numberCorrectAnswers;

        return $this;
    }

    /**
     * Get numberCorrectAnswers
     *
     * @return integer 
     */
    public function getNumberCorrectAnswers()
    {
        return $this->numberCorrectAnswers;
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
