<?php

namespace Acme\ReqBundle\Tests\Model\Quiz;

use Acme\ReqBundle\Tests\Model\TestSuite;
use Acme\ReqBundle\Model\Quiz\QuizSetupQuestionGetterWrapper;

/**
 * @author Andrea Fiori
 * @since  04 November 2014
 */
class QuizSetupQuestionGetterWrapperTest extends TestSuite
{
    private $objectToTest;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->objectToTest = new QuizSetupQuestionGetterWrapper($this->getEntityManagerMock());
    }
    
    public function testSetObjectWrapper()
    {
        $this->objectToTest->setupObjectWrapper();
        
        $this->assertInstanceOf('\Acme\ReqBundle\Model\RecordsGetterWrapperAbstract', $this->objectToTest->getObjectWrapper());
    }
    
    public function testSetupObjectWrapperInput()
    {
        $this->objectToTest->setupObjectWrapperInput();
        
        $input = $this->objectToTest->getObjectWrapper()->getInput();
        
        $this->assertArrayHasKey('orderBy', $input);
        $this->assertArrayHasKey('groupBy', $input);
    }
}