<?php

namespace Acme\ReqBundle\Entity;

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
     * @var \Acme\ReqBundle\Entity\QuizTags
     *
     * @ORM\ManyToOne(targetEntity="Acme\ReqBundle\Entity\QuizTags")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
     * })
     */
    private $tag;

    /**
     * @var \Acme\ReqBundle\Entity\Interview
     *
     * @ORM\ManyToOne(targetEntity="Acme\ReqBundle\Entity\Interview")
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
     * @param \Acme\ReqBundle\Entity\QuizTags $tag
     * @return InterviewTagsRelations
     */
    public function setTag(\Acme\ReqBundle\Entity\QuizTags $tag = null)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return \Acme\ReqBundle\Entity\QuizTags 
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set question
     *
     * @param \Acme\ReqBundle\Entity\Interview $question
     * @return InterviewTagsRelations
     */
    public function setQuestion(\Acme\ReqBundle\Entity\Interview $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \Acme\ReqBundle\Entity\Interview 
     */
    public function getQuestion()
    {
        return $this->question;
    }
}
