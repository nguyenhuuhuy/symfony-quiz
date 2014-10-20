<?php

namespace Acme\ReqBundle\Model\Quiz;

use Acme\ReqBundle\Model\RecordsGetterWrapperAbstract;

/**
 * @author Andrea Fiori
 * @since  06 June 2014
 */
class QuizAnswersGetterWrapper extends RecordsGetterWrapperAbstract
{
    private $objectGetter;
    
    /**
     * @param \Acme\ReqBundle\Model\Answers\QuizAnswersGetter $objectGetter
     */
    public function __construct(QuizAnswersGetter $objectGetter)
    {
        $this->objectGetter = $objectGetter;
    }
    
    public function setupQueryBuilder()
    {
        $this->objectGetter->setSelectQueryFields( $this->getInput('fields', 1) );
        $this->objectGetter->setMainQuery();
        $this->objectGetter->setQuestionId($this->getInput('questionId', 1));
        $this->objectGetter->setOrderBy( $this->getInput('orderBy', 1) );
        $this->objectGetter->setLimit( $this->getInput('limit', 1) );
        $this->objectGetter->setGroupBy( $this->getInput('groupBy', 1) );
    }

    /**
     * Use the postsGetter class to select records
     * 
     * @return array
     */
    public function getRecords()
    {
        return $this->objectGetter->getQueryResult();
    }
    
    /**
     * @return Acme\ReqBundle\Model\Answers\AnswersGetter
     */
    public function getAnswersGetter()
    {
        return $this->objectGetter;
    }
}