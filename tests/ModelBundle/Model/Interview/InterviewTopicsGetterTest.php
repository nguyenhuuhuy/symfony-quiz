<?php

namespace Acme\ModelBundle\Tests\Model\Interview;

use ModelBundle\Model\Interview\InterviewTopicsGetter;
use Tests\ModelBundle\Model\TestSuite;

class InterviewTopicsGetterTest extends TestSuite
{
    /**
     * @var InterviewTopicsGetter
     */
    private $objectGetter;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->objectGetter = new InterviewTopicsGetter($this->getEntityManager());
    }

    public function testSetMainQuery()
    {
        $this->assertInstanceOf('\Doctrine\ORM\QueryBuilder', $this->objectGetter->setMainQuery());
    }
}
