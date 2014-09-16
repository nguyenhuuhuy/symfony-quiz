<?php

namespace Acme\QuizBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuestionsTopicsRelations
 */
class QuestionsTopicsRelations
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Acme\QuizBundle\Entity\Tags
     */
    private $tag;

    /**
     * @var \Acme\QuizBundle\Entity\Questions
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
     * @param \Acme\QuizBundle\Entity\Tags $tag
     * @return QuestionsTopicsRelations
     */
    public function setTag(\Acme\QuizBundle\Entity\Tags $tag = null)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return \Acme\QuizBundle\Entity\Tags 
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set question
     *
     * @param \Acme\QuizBundle\Entity\Questions $question
     * @return QuestionsTopicsRelations
     */
    public function setQuestion(\Acme\QuizBundle\Entity\Questions $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \Acme\QuizBundle\Entity\Questions 
     */
    public function getQuestion()
    {
        return $this->question;
    }
}
