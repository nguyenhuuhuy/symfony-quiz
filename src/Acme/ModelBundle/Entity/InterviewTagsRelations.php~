<?php

namespace Acme\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InterviewTagsRelations
 *
 * @ORM\Table(name="interview_tags_relations", indexes={@ORM\Index(name="question_id", columns={"question_id"}), @ORM\Index(name="tag_id", columns={"tag_id"})})
 * @ORM\Entity
 */
class InterviewTagsRelations
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
     * @var \Acme\ModelBundle\Entity\QuizTags
     *
     * @ORM\ManyToOne(targetEntity="Acme\ModelBundle\Entity\QuizTags")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
     * })
     */
    private $tag;

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
     * Set tag
     *
     * @param \Acme\ModelBundle\Entity\QuizTags $tag
     * @return InterviewTagsRelations
     */
    public function setTag(\Acme\ModelBundle\Entity\QuizTags $tag = null)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return \Acme\ModelBundle\Entity\QuizTags 
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set question
     *
     * @param \Acme\ModelBundle\Entity\Interview $question
     * @return InterviewTagsRelations
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
