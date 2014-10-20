<?php

namespace Acme\ReqBundle\Model\Quiz;

use Acme\ReqBundle\Model\RecordsGetterWrapperAbstract;

/**
 * @author Andrea Fiori
 * @since  06 October 2014
 */
class QuizTagsGetterWrapper extends RecordsGetterWrapperAbstract
{
    /** @var \Acme\ReqBundle\Model\Tags\QuizTagsGetter */
    protected $objectGetter;
    
    /**
     * @param \Acme\ReqBundle\Model\Tags\QuizTagsGetter $objectGetter
     */
    public function __construct(QuizTagsGetter $objectGetter)
    {
        $this->objectGetter = $objectGetter;
    }

    public function setupQueryBuilder()
    {
        $this->objectGetter->setSelectQueryFields( $this->getInput('fields', 1) );
        $this->objectGetter->setMainQuery();
        $this->objectGetter->setQuestionId( $this->getInput('questionId', 1) );
        $this->objectGetter->setTagId( $this->getInput('tagId', 1) );
        $this->objectGetter->setOrderBy( $this->getInput('orderBy', 1) );
        $this->objectGetter->setLimit( $this->getInput('limit', 1) );
        $this->objectGetter->setGroupBy( $this->getInput('groupBy', 1) );
    }
} 