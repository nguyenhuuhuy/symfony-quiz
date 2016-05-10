<?php

namespace Acme\ModelBundle\Tests\Model\Interview;

use ModelBundle\Model\Interview\InterviewGetter;
use ModelBundle\Model\Interview\InterviewGetterWrapper;
use Tests\ModelBundle\Model\TestSuite;

class InterviewGetterWrapperTest extends TestSuite
{
    /**
     * @var InterviewGetterWrapper
     */
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