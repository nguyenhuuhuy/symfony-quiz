<?php

namespace Acme\ModelBundle\Tests\Model;

use Acme\ModelBundle\Tests\Model\TestSuite;;

/**
 * Class QueryBuilderHelperAbstractTest
 *
 * @author Andrea Fiori
 * @since  29 May 2014
 */
class QueryBuilderHelperAbstractTest extends TestSuite
{
    private $queryBuilderHelperAbstract;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->queryBuilderHelperAbstract = $this->getMockForAbstractClass('Acme\ModelBundle\Model\QueryBuilderHelperAbstract', array($this->getEntityManagerMock()));
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
