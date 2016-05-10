<?php

namespace Tests\ModelBundle\Model;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TestSuite extends WebTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    protected $entityManagerMock;

    protected function setUp()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager()
        ;
    }
    
    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();
        $this->em->close();
    }
    
    protected function getEntityManager()
    {
        return $this->em;
    }

    protected function getEntityManagerMock()
    {
        if ( !$this->entityManagerMock ) {
            $this->entityManagerMock = $this->setEntityManagerMock();
        }

        return $this->entityManagerMock;
    }

    /**
     * Mock Entity Manager Repository main methods
     */
    protected function setEntityManagerMock()
    {
        $configuration = $this->getMockBuilder('\Doctrine\ORM\Configuration')->getMock();

        $connection = $this->getConnectionMock();

        $queryBuilder = $this->getQueryBuilderMock();

        $this->entityManagerMock = $this->getMock('\Doctrine\ORM\EntityManager', array('getRepository', 'getClassMetadata', 'persist', 'flush', 'create', 'createQuery', 'getConnection', 'getQuery', 'getQueryBuilder', 'getConfiguration'), array(), '', false);

        $this->entityManagerMock
                 ->expects($this->any())
                 ->method('getClassMetadata')
                 ->will($this->returnValue( (object)array('name' => 'aClass')) );

        $this->entityManagerMock
                ->expects($this->any())
                ->method('persist')
                ->will($this->returnValue(true));

        $this->entityManagerMock
                ->expects($this->any())
                ->method('flush')
                ->will($this->returnValue(true));

        $this->entityManagerMock
                 ->expects($this->any())
                 ->method('getConfiguration')
                 ->will($this->returnValue($configuration));

        $this->entityManagerMock
                 ->expects($this->any())
                 ->method('getConnection')
                 ->will($this->returnValue($connection));
        
        $this->entityManagerMock
                 ->expects($this->any())
                 ->method('getQuery')
                 ->will($this->returnValue($queryBuilder));
        
        $this->entityManagerMock
                 ->expects($this->any())
                 ->method('getQueryBuilder')
                 ->will($this->returnValue($queryBuilder));
        
        $this->entityManagerMock
                ->expects($this->any())
                ->method('createQuery')
                ->will( $this->returnValue( $this->getQueryBuilderMock()) );
        
        return $this->entityManagerMock;
    }
    
    public function getConnectionMock()
    {
        $mock = $this->getMockBuilder('Doctrine\DBAL\Connection')
                     ->disableOriginalConstructor()
                     ->setMethods(
                        array(
                            'beginTransaction',
                            'commit',
                            'rollback',
                            'prepare',
                            'query',
                            'executeQuery',
                            'executeUpdate',
                            'getDatabasePlatform',
                        )
                    )
                    ->getMock();
 
        $mock->expects($this->any())
            ->method('prepare')
            ->will($this->returnValue('A string'));
 
        $mock->expects($this->any())
            ->method('query')
            ->will($this->returnValue($this->getQueryBuilderMock()));

        return $mock;
    }
    
    public function getQueryBuilderMock()
    {
        $queryBuilderMock = $this->getMock('\Doctrine\ORM\QueryBuilder', 
                array('setFirstResult', 'setMaxResults', 'add', 'setParameter', 'setParameters', 'where', 'andWhere', 'getQuery', 'getResult'), 
                array(), '', false);
        
        $queryBuilderMock->expects($this->any())
                     ->method('setFirstResult')
                     ->will( $this->returnValue( $queryBuilderMock ) );
        
        $queryBuilderMock->expects($this->any())
                     ->method('setMaxResults')
                     ->will( $this->returnValue( $queryBuilderMock ) );
        
        $queryBuilderMock->expects($this->any())
                         ->method('add')
                         ->will( $this->returnValue( $queryBuilderMock ) );
        
        $queryBuilderMock->expects($this->any())
                         ->method('setParameter')
                         ->will( $this->returnValue( $queryBuilderMock ) );
        
        $queryBuilderMock->expects($this->any())
                         ->method('setParameters')
                         ->will( $this->returnValue( $queryBuilderMock ) );

        $queryBuilderMock->expects($this->any())
                         ->method('where')
                         ->will( $this->returnValue( $queryBuilderMock ) );
        
        $queryBuilderMock->expects($this->any())
                         ->method('andWhere')
                         ->will( $this->returnValue( $queryBuilderMock ) );

        $queryBuilderMock->expects($this->any())
                         ->method('getQuery')
                         ->will( $this->returnValue( $queryBuilderMock ) );
        
        $queryBuilderMock
                 ->expects($this->any())
                 ->method('getResult')
                 ->will($this->returnValue( array("id" => 1,"myResult" => 'MyResult')) );
        
        return $queryBuilderMock;
    }
    
    public function testGetEntityManager()
    {
        $this->assertInstanceOf('\Doctrine\ORM\EntityManager', $this->getEntityManager());
        $this->assertInstanceOf('\Doctrine\ORM\EntityManager', $this->getEntityManagerMock());
    }
  
    public function testGetConnection()
    {   
        $this->assertInstanceOf('\Doctrine\DBAL\Connection', $this->getConnectionMock());
    }
    
    public function testGetQueryBuilderMock()
    {
        $this->assertInstanceOf('\Doctrine\ORM\QueryBuilder', $this->getQueryBuilderMock());
    }
}