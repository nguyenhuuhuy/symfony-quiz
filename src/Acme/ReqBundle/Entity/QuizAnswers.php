<?php

namespace Acme\ReqBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuizAnswers
 *
 * @ORM\Table(name="quiz_answers", indexes={@ORM\Index(name="question_id", columns={"question_id"})})
 * @ORM\Entity
 */
class QuizAnswers
{
    /**
     * @var string
     *
     * @ORM\Column(name="answer", type="text", nullable=true)
     */
    private $answer;

    /**
     * @var string
     *
     * @ORM\Column(name="correct", type="string", nullable=true)
     */
    private $correct;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Acme\ReqBundle\Entity\QuizQuestions
     *
     * @ORM\ManyToOne(targetEntity="Acme\ReqBundle\Entity\QuizQuestions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     * })
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
     * @param \Acme\ReqBundle\Entity\QuizQuestions $question
     * @return QuizAnswers
     */
    public function setQuestion(\Acme\ReqBundle\Entity\QuizQuestions $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \Acme\ReqBundle\Entity\QuizQuestions 
     */
    public function getQuestion()
    {
        return $this->question;
    }
}
