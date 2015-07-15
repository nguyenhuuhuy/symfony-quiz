<?php

namespace Acme\ReqBundle\Model\Quiz;

use Acme\ReqBundle\Model\RecordsGetterWrapperAbstract;

/**
 * @author Andrea Fiori
 * @since  06 June 2014
 */
class QuizAnswersGetterWrapper extends RecordsGetterWrapperAbstract
{
    /**
     * @param \Acme\ReqBundle\Model\Answers\QuizAnswersGetter $objectGetter
     */
    public function __construct(QuizAnswersGetter $objectGetter)
    {
        $this->setObjectGetter($objectGetter);
    }
    
    public function setupQueryBuilder()
    {
        $this->getObjectGetter()->setSelectQueryFields( $this->getInput('fields', 1) );
        $this->getObjectGetter()->setMainQuery();
        $this->getObjectGetter()->setQuestionId($this->getInput('questionId', 1));
        $this->getObjectGetter()->setOrderBy( $this->getInput('orderBy', 1) );
        $this->getObjectGetter()->setLimit( $this->getInput('limit', 1) );
        $this->getObjectGetter()->setGroupBy( $this->getInput('groupBy', 1) );
    }
}