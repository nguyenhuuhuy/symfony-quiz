<?php

namespace ModelBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;

/**
 * Help child classes with db queries to set common parameters
 */
abstract class QueryBuilderHelperAbstract
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    protected $queryBuilder;

    protected $firstResult = 0;
    protected $maxResults = 770;

    protected $selectQueryFields;

    /**
     * @param ObjectManager $entityManager
     */
    public function __construct(ObjectManager $entityManager)
    {
        $this->entityManager = $entityManager;

        $this->queryBuilder = $this->entityManager->createQueryBuilder();
    }

    /**
     * @return \Doctrine\ORM\Query
     */
    public function getQuery()
    {
        return $this->getQueryBuilder()->getQuery();
    }
    
    /**
     * Get DQL query string
     * 
     * @return string
     */
    public function getDQLQuery()
    {
        return $this->getQueryBuilder()->getQuery()->getDQL();
    }
    
    /**
     * Query result recordset
     * 
     * @return mixed
     */
    public function getQueryResult()
    {
        $this->getQueryBuilder()->setFirstResult($this->firstResult);
        $this->getQueryBuilder()->setMaxResults($this->maxResults);
        
        return $this->getQueryBuilder()->getQuery()->getResult();
    }

    /**
     * Return the QueryBuilder object
     * 
     * @return \Doctrine\ORM\QueryBuilder $this->queryBuilder
     */
    public function getQueryBuilder()
    {
        return $this->queryBuilder;
    }
    
    /**
     * @return \Doctrine\ORM\EntityManager $entityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }
    
    /**
     * @param string $stringFields
     */
    public function setSelectQueryFields($stringFields = '')
    {
        if (!$this->selectQueryFields) {
            $this->selectQueryFields = $stringFields;
        }
        
        return $this->selectQueryFields;
    }

    /**
     * @return mixed
     */
    public function getSelectQueryFields()
    {
        return $this->selectQueryFields;
    }
    
    /**
     * @param string $orderBy
     * @param string $defaultField
     * @return string
     */
    public function setOrderBy($orderBy = null, $defaultField = null)
    {
        return $this->bindWithDefaultParameter($orderBy, 'orderBy', $defaultField);
    }
    
    /**
     * @param string $groupBy
     * @param string $defaultField
     * @return string
     */
    public function setGroupBy($groupBy = null, $defaultField = null)
    {
        return $this->bindWithDefaultParameter($groupBy, 'groupBy', $defaultField);
    }
    
        /**
         * @param string $parameter
         * @param string $parameterString
         * @param string $defaultField
         * @return \Doctrine\ORM\QueryBuilder
         */
        private function bindWithDefaultParameter($parameter = null, $parameterString = null, $defaultField = null)
        {
            if (!$parameter) {
                $parameter = $defaultField;
            }

            if ($parameter) {
                $this->getQueryBuilder()->add($parameterString, $parameter);
            }

            return $this->getQueryBuilder();
        }
    
    /**
     * @param  number $limit
     * @return number
     */
    public function setLimit($limit = null)
    {
        if ( is_numeric($limit) ) {
            $this->maxResults = $limit;
        }
        
        return $this->maxResults;
    }
}
