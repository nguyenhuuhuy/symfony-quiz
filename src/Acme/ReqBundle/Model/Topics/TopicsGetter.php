<?php

namespace Acme\ReqBundle\Model\Topics;

use Acme\ReqBundle\Model\QueryBuilderHelperAbstract;

/**
 * @author Andrea Fiori
 * @since  05 October 2014
 */
class TopicsGetter extends QueryBuilderHelperAbstract
{
    public function setMainQuery()
    {
        $this->setSelectQueryFields('t.id, t.name, t.parentId, t.position');

        $this->getQueryBuilder()->add('select', $this->getSelectQueryFields())
                                ->add('from', 'AcmeReqBundle:Topics t')
                                ->where("t.id != '' ");
        
        return $this->getQueryBuilder();
    }
    
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