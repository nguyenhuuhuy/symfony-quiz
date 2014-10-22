<?php

namespace Acme\ReqBundle\Tests\Model\Interview;

use Acme\ReqBundle\Tests\Model\TestSuite;
use Acme\ReqBundle\Model\Interview\InterviewTagsGetter;
use Acme\ReqBundle\Model\Interview\InterviewTagsGetterWrapper;

/**
 * @author Andrea Fiori
 * @since  22 October 2014
 */
class InterviewTagsGetterWrapperTest extends TestSuite
{
    private $objectGetterWrapper;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->objectGetterWrapper = new InterviewTagsGetterWrapper( new InterviewTagsGetter($this->getEntityManagerMock()) );
    }
    
    public function testSetupQueryBuilder()
    {
        $this->assertNull( $this->objectGetterWrapper->setupQueryBuilder() );
    }
}