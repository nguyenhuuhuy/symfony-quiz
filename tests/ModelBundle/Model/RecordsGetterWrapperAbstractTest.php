<?php

namespace Tests\ModelBundle\Model;

class RecordsGetterWrapperAbstractTest extends TestSuite
{
    /**
     * @var \ModelBundle\Model\RecordsGetterWrapperAbstract
     */
    private $recordsGetterWrapperAbstract;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->recordsGetterWrapperAbstract = $this->getMockForAbstractClass('\ModelBundle\Model\RecordsGetterWrapperAbstract');
    }
    
    public function testSetInput()
    {
        $this->assertTrue( is_array($this->recordsGetterWrapperAbstract->setInput(array("id"=>1,'title'=>'myTitle'))) );
    }
}
