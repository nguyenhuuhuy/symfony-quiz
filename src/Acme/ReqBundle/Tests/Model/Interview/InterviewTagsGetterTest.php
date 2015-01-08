<?php

namespace Acme\ReqBundle\Tests\Model\Interview;

use Acme\ReqBundle\Tests\Model\TestSuite;
use Acme\ModelBundle\Model\Interview\InterviewTagsGetter;

/**
 * @author Andrea Fiori
 * @since  05 June 2014
 */
class InterviewTagsGetterTest extends TestSuite
{    
    private $objectGetter;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->objectGetter = new InterviewTagsGetter($this->getEntityManager());
    }

    public function testSetMainQuery()
    {
        $this->assertInstanceOf('\Doctrine\ORM\QueryBuilder', $this->objectGetter->setMainQuery());
    }
}
