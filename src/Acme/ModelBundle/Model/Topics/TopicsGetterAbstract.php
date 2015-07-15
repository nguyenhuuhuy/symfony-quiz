<?php

namespace Acme\ModelBundle\Model\Topics;

use Acme\ModelBundle\Model\QueryBuilderHelperAbstract;

/**
 * @author Andrea Fiori
 * @since  21 October 2014
 */
abstract class TopicsGetterAbstract extends QueryBuilderHelperAbstract
{
    /**
     * @param int or array $id
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function setId($id)
    {
        if ( is_numeric($id) ) {
            $this->getQueryBuilder()->andWhere('t.id = :id');
            $this->getQueryBuilder()->setParameter('id', $id);
        }
        
        if (is_array($id)) {
            $this->getQueryBuilder()->andWhere('t.id IN ( :id ) ');
            $this->getQueryBuilder()->setParameter('id', $id);
        }
        
        return $this->getQueryBuilder();
    }
    
    /**
     * @param string $name
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function setName($name)
    {
        if ( is_string($name) ) {
            $this->getQueryBuilder()->andWhere('t.name = LOWER( :name ) ');
            $this->getQueryBuilder()->setParameter('name', $name);
        }
        return $this->getQueryBuilder();
    }
    
    /**
     * @param int $parentId
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function setParentId($parentId)
    {
        if (is_numeric($parentId) ) {
            $this->getQueryBuilder()->andWhere('t.parentId = :parentId ');
            $this->getQueryBuilder()->setParameter('parentId', $parentId);
        }
        return $this->getQueryBuilder();
    }
    
    /**
     * @param string $orderBy
     * @param string $defaultField
     */
    public function setOrderBy($orderBy = null, $defaultField = null)
    {
        if (!$orderBy) {
            $orderBy = 't.position';
        }
        
        parent::setOrderBy($orderBy, $defaultField);
    }
}