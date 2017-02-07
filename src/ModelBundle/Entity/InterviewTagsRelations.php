<?php

namespace ModelBundle\Entity;

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
     * @var \ModelBundle\Entity\Tags
     *
     * @ORM\ManyToOne(targetEntity="ModelBundle\Entity\QuizTags")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
     * })
     */
    private $tag;

    /**
     * @var \ModelBundle\Entity\Interview
     *
     * @ORM\ManyToOne(targetEntity="ModelBundle\Entity\Interview")
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
     * @param \ModelBundle\Entity\Tags $tag
     * @return InterviewTagsRelations
     */
    public function setTag(\ModelBundle\Entity\Tags $tag = null)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return \ModelBundle\Entity\Tags
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set question
     *
     * @param \ModelBundle\Entity\Interview $question
     * @return InterviewTagsRelations
     */
    public function setQuestion(\ModelBundle\Entity\Interview $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \ModelBundle\Entity\Interview 
     */
    public function getQuestion()
    {
        return $this->question;
    }
}
