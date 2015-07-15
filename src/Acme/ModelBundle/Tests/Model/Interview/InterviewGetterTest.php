<?php

namespace Acme\ReqBundle\Tests\Model\Interview;

use Acme\ModelBundle\Model\Interview\InterviewGetter;
use Acme\ModelBundle\Tests\Model\TestSuite;

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
        $this->objectGetter->setMainQuery();
    }

    public function testSetImportant()
    {
        $this->objectGetter->setImportant(1);

        $this->assertNotEmpty( $this->objectGetter->getQueryBuilder()->getParameter('important') );
    }
}
