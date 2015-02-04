<?php

namespace Acme\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InterviewRelations
 *
 * @ORM\Table(name="interview_relations", indexes={@ORM\Index(name="fk_interview_topic_id", columns={"topic_id"}), @ORM\Index(name="fk_interview_question_id", columns={"question_id"})})
 * @ORM\Entity
 */
class InterviewRelations
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
     * @var \Acme\ModelBundle\Entity\Interview
     *
     * @ORM\ManyToOne(targetEntity="Acme\ModelBundle\Entity\Interview")
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
     * @return InterviewRelations
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
     * @param \Acme\ModelBundle\Entity\Interview $question
     * @return InterviewRelations
     */
    public function setQuestion(\Acme\ModelBundle\Entity\Interview $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \Acme\ModelBundle\Entity\Interview 
     */
    public function getQuestion()
    {
        return $this->question;
    }
}
