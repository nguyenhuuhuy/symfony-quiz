<?php

namespace Acme\ReqBundle\Tests\Model\Topics;

use ModelBundle\Model\Topics\TopicsGetter;
use ModelBundle\Model\Topics\TopicsGetterWrapper;
use Tests\ModelBundle\Model\TestSuite;

class TopicsGetterWrapperTest extends TestSuite
{
    /**
     * @var TopicsGetterWrapper
     */
    private $objectGetterWrapper;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->objectGetterWrapper = new TopicsGetterWrapper( new TopicsGetter($this->getEntityManagerMock()) );
    }
    
    public function testSetupQueryBuilder()
    {
        $this->assertNull( $this->objectGetterWrapper->setupQueryBuilder() );
    }
}
