<?php

namespace Acme\ReqBundle\Model\Quiz;

use Acme\ReqBundle\Model\RecordsGetterWrapperAbstract;

/**
 * @author Andrea Fiori
 * @since  06 June 2014
 */
class QuizQuestionsGetterWrapper extends RecordsGetterWrapperAbstract
{
    /** @var QuizQuestionsGetter **/
    protected $objectGetter;
    
    /**
     * @param QuizQuestionsGetter $objectGetter
     */
    public function __construct(QuizQuestionsGetter $objectGetter)
    {
        $this->objectGetter = $objectGetter;
    }
    
    public function setupQueryBuilder()
    {
        $this->objectGetter->setSelectQueryFields( $this->getInput('fields', 1) );
        $this->objectGetter->setMainQuery();
        $this->objectGetter->setQuestionId($this->getInput('questionId', 1));
        $this->objectGetter->setTopicName($this->getInput('topicName', 1));
        $this->objectGetter->setOrderBy( $this->getInput('orderBy', 1) );
        $this->objectGetter->setLimit( $this->getInput('limit', 1) );
        $this->objectGetter->setGroupBy( $this->getInput('groupBy', 1) );
    }
}