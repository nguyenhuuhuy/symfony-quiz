<?php

namespace ModelBundle\Model\Interview;

use ModelBundle\Model\RecordsGetterWrapperAbstract;

class InterviewGetterWrapper extends RecordsGetterWrapperAbstract
{
    /**
     * @var InterviewGetter
     */
    protected $objectGetter;
    
    /**
     * @param InterviewGetter $objectGetter
     */
    public function __construct(InterviewGetter $objectGetter)
    {
        $this->objectGetter = $objectGetter;
    }

    public function setupQueryBuilder()
    {
        $this->objectGetter->setSelectQueryFields( $this->getInput('fields', 1) );
        $this->objectGetter->setMainQuery();
        $this->objectGetter->setImportant( $this->getInput('important', 1) );
        $this->objectGetter->setOrderBy( $this->getInput('orderBy', 1) );
        $this->objectGetter->setLimit( $this->getInput('limit', 1) );
        $this->objectGetter->setGroupBy( $this->getInput('groupBy', 1) );

        return null;
    }
}