<?php

namespace Acme\ModelBundle\Tests\Model\Interview;

use Acme\ModelBundle\Tests\Model\TestSuite;;
use Acme\ModelBundle\Model\Interview\InterviewTagsGetter;
use Acme\ModelBundle\Model\Interview\InterviewTagsGetterWrapper;

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