<?php

namespace Acme\ModelBundle\Tests\Model\Interview;

use Tests\ModelBundle\Model\TestSuite;;
use ModelBundle\Model\Interview\InterviewTagsGetter;
use ModelBundle\Model\Interview\InterviewTagsGetterWrapper;

class InterviewTagsGetterWrapperTest extends TestSuite
{
    /**
     * @var InterviewTagsGetterWrapper
     */
    private $objectGetterWrapper;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->objectGetterWrapper = new InterviewTagsGetterWrapper(
            new InterviewTagsGetter($this->getEntityManagerMock())
        );
    }
    
    public function testSetupQueryBuilder()
    {
        $this->assertNull( $this->objectGetterWrapper->setupQueryBuilder() );
    }
}