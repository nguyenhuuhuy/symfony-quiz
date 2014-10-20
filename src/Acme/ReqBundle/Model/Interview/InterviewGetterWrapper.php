<?php

namespace Acme\ReqBundle\Model\Interview;

use Acme\ReqBundle\Model\RecordsGetterWrapperAbstract;

/**
 * @author Andrea Fiori
 * @since  21 October 2014
 */
class InterviewGetterWrapper extends RecordsGetterWrapperAbstract
{
    /** @var \Acme\ReqBundle\Model\Interview\InterviewGetter **/
    protected $objectGetter;
    
    /**
     * @param \Acme\ReqBundle\Model\Interview\InterviewGetter $objectGetter
     */
    public function __construct(InterviewGetter $objectGetter)
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