<?php

namespace Acme\ReqBundle\Tests\Model\Questions;

use Tests\ModelBundle\Model\TestSuite;;
use ModelBundle\Model\Topics\TopicsGetter;

class TopicsGetterTest extends TestSuite
{
    /**
     * @var TopicsGetter
     */
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