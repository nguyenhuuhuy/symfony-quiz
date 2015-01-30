<?php

namespace Acme\ModelBundle\Entity;

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
     * @var \Acme\ModelBundle\Entity\Topics
     *
     * @ORM\ManyToOne(targetEntity="Acme\ModelBundle\Entity\Topics")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="topic_id", referencedColumnName="id")
     * })
     */
    private $topic;

    /**
     * @var \Acme\ModelBundle\Entity\QuizQuestions
     *
     * @ORM\ManyToOne(targetEntity="Acme\ModelBundle\Entity\QuizQuestions")
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
     * @param \Acme\ModelBundle\Entity\Topics $topic
     * @return QuizQuestionsRelations
     */
    public function setTopic(\Acme\ModelBundle\Entity\Topics $topic = null)
    {
        $this->topic = $topic;

        return $this;
    }

    /**
     * Get topic
     *
     * @return \Acme\ModelBundle\Entity\Topics 
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Set question
     *
     * @param \Acme\ModelBundle\Entity\QuizQuestions $question
     * @return QuizQuestionsRelations
     */
    public function setQuestion(\Acme\ModelBundle\Entity\QuizQuestions $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \Acme\ModelBundle\Entity\QuizQuestions 
     */
    public function getQuestion()
    {
        return $this->question;
    }
}
