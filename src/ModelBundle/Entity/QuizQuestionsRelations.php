<?php

namespace ModelBundle\Entity;

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
     * @var \ModelBundle\Entity\Topics
     *
     * @ORM\ManyToOne(targetEntity="ModelBundle\Entity\Topics")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="topic_id", referencedColumnName="id")
     * })
     */
    private $topic;

    /**
     * @var \ModelBundle\Entity\QuizQuestions
     *
     * @ORM\ManyToOne(targetEntity="ModelBundle\Entity\QuizQuestions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     * })
     */
    private $question;

    /**
     * Set id
     *
     * @return integer
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set topic
     *
     * @param \ModelBundle\Entity\Topics $topic
     * @return QuizQuestionsRelations
     */
    public function setTopic(\ModelBundle\Entity\Topics $topic = null)
    {
        $this->topic = $topic;

        return $this;
    }

    /**
     * Get topic
     *
     * @return \ModelBundle\Entity\Topics 
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Set question
     *
     * @param \ModelBundle\Entity\QuizQuestions $question
     * @return QuizQuestionsRelations
     */
    public function setQuestion(\ModelBundle\Entity\QuizQuestions $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \ModelBundle\Entity\QuizQuestions 
     */
    public function getQuestion()
    {
        return $this->question;
    }
}
