<?php

namespace Acme\ReqBundle\Tests\Model\Interview;

use Acme\ReqBundle\Tests\Model\TestSuite;
use Acme\ReqBundle\Model\Interview\InterviewTopicsGetter;

/**
 * @author Andrea Fiori
 * @since  22 October 2014
 */
class InterviewTopicsGetterTest extends TestSuite
{
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
