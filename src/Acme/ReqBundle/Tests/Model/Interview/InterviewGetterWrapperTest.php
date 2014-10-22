<?php

namespace Acme\ReqBundle\Tests\Model\Interview;

use Acme\ReqBundle\Tests\Model\TestSuite;
use Acme\ReqBundle\Model\Interview\InterviewGetter;
use Acme\ReqBundle\Model\Interview\InterviewGetterWrapper;

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