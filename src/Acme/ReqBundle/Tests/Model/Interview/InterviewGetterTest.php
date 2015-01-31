<?php

namespace Acme\ReqBundle\Tests\Model\Interview;

use Acme\ReqBundle\Tests\Model\TestSuite;
use Acme\ModelBundle\Model\Interview\InterviewGetter;

/**
 * Class InterviewGetterTest
 *
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
        $this->objectGetter->setMainQuery();
    }

    public function testSetImportant()
    {
        $this->objectGetter->setImportant(1);

        $this->assertNotEmpty( $this->objectGetter->getQueryBuilder()->getParameter('important') );
    }
}
