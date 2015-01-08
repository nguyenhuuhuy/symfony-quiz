<?php

namespace Acme\ModelBundle\Model\Interview;

use Acme\ModelBundle\Model\RecordsGetterWrapperAbstract;

/**
 * @author Andrea Fiori
 * @since  22 October 2014
 */
class InterviewTagsGetterWrapper extends RecordsGetterWrapperAbstract
{
    /** @var \Acme\ReqBundle\Model\Interview\InterviewTagsGetter **/
    protected $objectGetter;
    
    /**
     * @param \Acme\ReqBundle\Model\Interview\InterviewTagsGetter $objectGetter
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
        $this->objectGetter->setLimit( $this->getInput('limit', 1) );
        $this->objectGetter->setGroupBy( $this->getInput('groupBy', 1) );
    }
}
