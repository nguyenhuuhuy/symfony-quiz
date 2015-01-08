<?php

namespace Acme\ReqBundle\Tests\Model\Questions;

use Acme\ReqBundle\Tests\Model\TestSuite;
use Acme\ModelBundle\Model\Topics\TopicsGetter;

/**
 * @author Andrea Fiori
 * @since  06 June 2014
 */
class TopicsGetterTest extends TestSuite
{
    private $objectGetter;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->objectGetter = new TopicsGetter($this->getEntityManagerMock());
    }
    
    public function testSetMainQuery()
    {
        $this->assertInstanceOf('\Doctrine\ORM\QueryBuilder', $this->objectGetter->setMainQuery());
    }
    
    public function testSetQuestionId()
    {
        $this->objectGetter->setId(12);

        $this->assertNotEmpty($this->objectGetter->getQueryBuilder()->getParameter('id'));
    }

    public function testSetName()
    {
        $this->objectGetter->setName('PHP');
        
        $this->assertNotEmpty($this->objectGetter->getQueryBuilder()->getParameter('name'));
    }
}