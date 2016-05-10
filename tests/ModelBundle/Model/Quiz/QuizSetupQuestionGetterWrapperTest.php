<?php

namespace Tests\AppBundle\Model\Quiz;

use ModelBundle\Model\Quiz\QuizSetupQuestionGetterWrapper;
use Tests\ModelBundle\Model\TestSuite;

class QuizSetupQuestionGetterWrapperTest extends TestSuite
{
    /**
     * @var QuizSetupQuestionGetterWrapper
     */
    private $objectToTest;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->objectToTest = new QuizSetupQuestionGetterWrapper($this->getEntityManagerMock());
    }
    
    public function testSetObjectWrapper()
    {
        $this->objectToTest->setupObjectWrapper();
        
        $this->assertInstanceOf('\ModelBundle\Model\RecordsGetterWrapperAbstract', $this->objectToTest->getObjectWrapper());
    }
    
    public function testSetupObjectWrapperInput()
    {
        $this->objectToTest->setupObjectWrapperInput();
        
        $input = $this->objectToTest->getObjectWrapper()->getInput();
        
        $this->assertArrayHasKey('orderBy', $input);
        $this->assertArrayHasKey('groupBy', $input);
    }
}