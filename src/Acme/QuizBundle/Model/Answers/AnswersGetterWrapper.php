<?php

namespace Acme\QuizBundle\Model\Answers;

use Acme\QuizBundle\Model\RecordsGetterWrapperAbstract;
use Acme\QuizBundle\Model\Answers\AnswersGetter;

/**
 * Given the AnswersGetter, use it to set input and give the answer records
 * 
 * @author Andrea Fiori
 * @since  06 June 2014
 */
class AnswersGetterWrapper extends RecordsGetterWrapperAbstract
{
    private $answersGetter;
    
    /**
     * @param \Acme\QuizBundle\Model\Answers\AnswersGetter $answersGetter
     */
    public function __construct(AnswersGetter $answersGetter)
    {
        $this->answersGetter = $answersGetter;
    }
    
    public function setupQueryBuilder()
    {
        $this->answersGetter->setSelectQueryFields( $this->getInput('fields', 1) );
        
        $this->answersGetter->setMainQuery();
        
        $this->answersGetter->setQuestionId($this->getInput('questionId', 1));
        $this->answersGetter->setLimit( $this->getInput('limit', 1) );
    }
        
    /**
     * Use the postsGetter class to select records
     * 
     * @return array
     */
    public function getRecords()
    {
        return $this->answersGetter->getQueryResult();
    }
    
    /**
     * @return Acme\QuizBundle\Model\Answers\AnswersGetter
     */
    public function getAnswersGetter()
    {
        return $this->answersGetter;
    }
    
}
