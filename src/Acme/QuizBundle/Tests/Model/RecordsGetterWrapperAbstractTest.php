<?php

namespace Acme\QuizBundle\Tests\Model;

use Acme\QuizBundle\Tests\Model\TestSuite;

/**
 * @author Andrea Fiori
 * @since  11 June 2014
 */
class RecordsGetterWrapperAbstractTest extends TestSuite
{
    private $recordsGetterWrapperAbstract;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->recordsGetterWrapperAbstract = $this->getMockForAbstractClass('\Acme\QuizBundle\Model\RecordsGetterWrapperAbstract');
    }
    
    public function testSetInput()
    {
        $this->assertTrue( is_array($this->recordsGetterWrapperAbstract->setInput(array("id"=>1,'title'=>'myTitle'))) );
    }
}
