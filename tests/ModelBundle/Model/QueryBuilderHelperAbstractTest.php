<?php

namespace Tests\ModelBundle\Model;

class QueryBuilderHelperAbstractTest extends TestSuite
{
    /**
     * @var \ModelBundle\Model\QueryBuilderHelperAbstract
     */
    private $queryBuilderHelperAbstract;
    
    protected function setUp()
    {
        parent::setUp();

        $this->queryBuilderHelperAbstract = $this->getMockForAbstractClass('ModelBundle\Model\QueryBuilderHelperAbstract', array($this->getEntityManagerMock()));
    }
    
    public function testGetQuery()
    {
        $this->assertInstanceOf('\Doctrine\ORM\QueryBuilder', $this->queryBuilderHelperAbstract->getQuery() );
    }
    
    public function testGetDQLQuery()
    {
        $this->assertTrue( is_string($this->queryBuilderHelperAbstract->getDQLQuery()) );
    }
    
    public function testGetQueryResult()
    {
        $this->assertTrue( is_array($this->queryBuilderHelperAbstract->getQueryResult()) );
    }

    public function testGetEntityManager()
    {
        $this->assertInstanceOf('\Doctrine\ORM\EntityManager', $this->queryBuilderHelperAbstract->getEntityManager() );
    }
    
    public function testSetLimit()
    {
        $this->assertNotEmpty( $this->queryBuilderHelperAbstract->setLimit() );

        $this->assertEquals($this->queryBuilderHelperAbstract->setLimit(3), 3);
    }
}
