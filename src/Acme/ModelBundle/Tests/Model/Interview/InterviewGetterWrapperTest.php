<?php

namespace Acme\ModelBundle\Tests\Model\Interview;

use Acme\ModelBundle\Tests\Model\TestSuite;
use Acme\ModelBundle\Model\Interview\InterviewGetter;
use Acme\ModelBundle\Model\Interview\InterviewGetterWrapper;

/**
 * @author Andrea Fiori
 * @since  22 October 2014
 */
class InterviewGetterWrapperTest extends TestSuite
{
    private $objectGetterWrapper;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->objectGetterWrapper = new InterviewGetterWrapper( new InterviewGetter($this->getEntityManagerMock()) );
    }
    
    public function testSetupQueryBuilder()
    {
        $this->assertNull( $this->objectGetterWrapper->setupQueryBuilder() );
    }
}