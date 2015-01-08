<?php

namespace Acme\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Interview
 *
 * @ORM\Table(name="interview")
 * @ORM\Entity
 */
class Interview
{
    /**
     * @var string
     *
     * @ORM\Column(name="question", type="string", length=150, nullable=true)
     */
    private $question;

    /**
     * @var string
     *
     * @ORM\Column(name="answer", type="text", length=65535, nullable=true)
     */
    private $answer;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="bigint", nullable=true)
     */
    private $position;

    /**
     * @var string
     *
     * @ORM\Column(name="topics_old", type="string", length=150, nullable=true)
     */
    private $topicsOld;

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
     * @return Interview
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
     * Set answer
     *
     * @param string $answer
     * @return Interview
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
     * Set position
     *
     * @param integer $position
     * @return Interview
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set topicsOld
     *
     * @param string $topicsOld
     * @return Interview
     */
    public function setTopicsOld($topicsOld)
    {
        $this->topicsOld = $topicsOld;

        return $this;
    }

    /**
     * Get topicsOld
     *
     * @return string 
     */
    public function getTopicsOld()
    {
        return $this->topicsOld;
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
