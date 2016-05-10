<?php

namespace ModelBundle\Model\Interview;

use ModelBundle\Model\RecordsGetterWrapperAbstract;

class InterviewTagsGetterWrapper extends RecordsGetterWrapperAbstract
{
    /**
     * @var InterviewTagsGetter
     */
    protected $objectGetter;
    
    /**
     * @param InterviewTagsGetter $objectGetter
     */
    public function __construct(InterviewTagsGetter $objectGetter)
    {
        $this->objectGetter = $objectGetter;
    }
    
    public function setupQueryBuilder()
    {
        $this->objectGetter->setSelectQueryFields( $this->getInput('fields', 1) );
        $this->objectGetter->setMainQuery();
        $this->objectGetter->setOrderBy( $this->getInput('orderBy', 1) );
        $this->objectGetter->setQuestionId( $this->getInput('questionId', 1) );
        $this->objectGetter->setTagSlug( $this->getInput('tagSlug', 1) );
        $this->objectGetter->setImportant( $this->getInput('important', 1) );
        $this->objectGetter->setLimit( $this->getInput('limit', 1) );
        $this->objectGetter->setGroupBy( $this->getInput('groupBy', 1) );

        return null;
    }
}
