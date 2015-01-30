<?php

namespace Acme\ModelBundle\Model\Topics;

use Acme\ModelBundle\Model\RecordsGetterWrapperAbstract;

/**
 * Class TopicsGetterWrapper
 *
 * @author Andrea Fiori
 * @since  06 October 2014
 */
class TopicsGetterWrapper extends RecordsGetterWrapperAbstract
{
    /**
     * @var TopicsGetterAbstract
     */
    protected $objectGetter;
    
    /**
     * @param TopicsGetterAbstract $objectsGetter
     */
    public function __construct(TopicsGetterAbstract $objectsGetter)
    {
        $this->objectGetter = $objectsGetter;
    }
    
    public function setupQueryBuilder()
    {
        $this->objectGetter->setSelectQueryFields( $this->getInput('fields', 1) );
        $this->objectGetter->setMainQuery();
        $this->objectGetter->setId( $this->getInput('id', 1) );
        $this->objectGetter->setName( $this->getInput('name', 1) );
        $this->objectGetter->setOrderBy( $this->getInput('orderBy', 1) );
        $this->objectGetter->setLimit( $this->getInput('limit', 1) );
        $this->objectGetter->setGroupBy( $this->getInput('groupBy', 1) );
    }
}