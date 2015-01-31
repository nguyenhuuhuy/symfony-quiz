<?php

namespace Acme\ReqBundle\Tests\Model;

use Acme\ReqBundle\Tests\Model\TestSuite;

/**
 * Class RecordsGetterWrapperAbstractTest
 *
 * @author Andrea Fiori
 * @since  11 June 2014
 */
class RecordsGetterWrapperAbstractTest extends TestSuite
{
    private $recordsGetterWrapperAbstract;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->recordsGetterWrapperAbstract = $this->getMockForAbstractClass('\Acme\ModelBundle\Model\RecordsGetterWrapperAbstract');
    }
    
    public function testSetInput()
    {
        $this->assertTrue( is_array($this->recordsGetterWrapperAbstract->setInput(array("id"=>1,'title'=>'myTitle'))) );
    }
}
