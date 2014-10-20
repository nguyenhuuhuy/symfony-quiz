<?php

namespace Acme\ReqBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuizQuestionsRelations
 *
 * @ORM\Table(name="quiz_questions_relations", indexes={@ORM\Index(name="question_id", columns={"topic_id"}), @ORM\Index(name="topic_id", columns={"question_id"})})
 * @ORM\Entity
 */
class QuizQuestionsRelations
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Acme\ReqBundle\Entity\Topics
     *
     * @ORM\ManyToOne(targetEntity="Acme\ReqBundle\Entity\Topics")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="topic_id", referencedColumnName="id")
     * })
     */
    private $topic;

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
     * @param \Acme\ReqBundle\Entity\Topics $topic
     * @return QuizQuestionsRelations
     */
    public function setTopic(\Acme\ReqBundle\Entity\Topics $topic = null)
    {
        $this->topic = $topic;

        return $this;
    }

    /**
     * Get topic
     *
     * @return \Acme\ReqBundle\Entity\Topics 
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Set question
     *
     * @param \Acme\ReqBundle\Entity\QuizQuestions $question
     * @return QuizQuestionsRelations
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
