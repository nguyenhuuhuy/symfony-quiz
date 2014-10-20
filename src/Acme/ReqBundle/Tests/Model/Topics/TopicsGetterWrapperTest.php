<?php

namespace Acme\ReqBundle\Tests\Model\Topics;

use Acme\ReqBundle\Tests\Model\TestSuite;
use Acme\ReqBundle\Model\Topics\TopicsGetter;
use Acme\ReqBundle\Model\Topics\TopicsGetterWrapper;

/**
 * @author Andrea Fiori
 * @since  06 October 2014
 */
class TopicsGetterWrapperTest extends TestSuite
{
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
