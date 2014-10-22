<?php

namespace Acme\ReqBundle\Tests\Model\Interview;

use Acme\ReqBundle\Tests\Model\TestSuite;
use Acme\ReqBundle\Model\Interview\InterviewGetter;

/**
 * @author Andrea Fiori
 * @since  05 June 2014
 */
class InterviewGetterTest extends TestSuite
{
    private $objectGetter;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->objectGetter = new InterviewGetter($this->getEntityManager());
    }

    public function testSetMainQuery()
    {
        $this->assertInstanceOf('\Doctrine\ORM\QueryBuilder', $this->objectGetter->setMainQuery());
    }
}
