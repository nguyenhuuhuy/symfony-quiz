<?php

namespace Acme\ModelBundle\Model\Interview;

use Acme\ModelBundle\Model\RecordsGetterWrapperAbstract;

/**
 * Class InterviewTagsGetterWrapper
 *
 * @author Andrea Fiori
 * @since  22 October 2014
 */
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
        $this->objectGetter->setLimit( $this->getInput('limit', 1) );
        $this->objectGetter->setGroupBy( $this->getInput('groupBy', 1) );
    }
}
