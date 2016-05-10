<?php

namespace ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuizTagsRelations
 *
 * @ORM\Table(name="quiz_tags_relations", indexes={@ORM\Index(name="question_id", columns={"question_id"}), @ORM\Index(name="tag_id", columns={"tag_id"})})
 * @ORM\Entity
 */
class QuizTagsRelations
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
     * @ORM\ManyToOne(targetEntity="ModelBundle\Entity\Tags")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
     * })
     */
    private $tag;

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
     * Set tag
     *
     * @param \ModelBundle\Entity\Tags $tag
     * @return QuizTagsRelations
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
     * @param \ModelBundle\Entity\QuizQuestions $question
     * @return QuizTagsRelations
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
