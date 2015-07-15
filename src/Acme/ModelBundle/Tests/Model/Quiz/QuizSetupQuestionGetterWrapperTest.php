<?php

namespace Acme\ReqBundle\Tests\Model\Quiz;

use Acme\ModelBundle\Tests\Model\TestSuite;;
use Acme\ModelBundle\Model\Quiz\QuizSetupQuestionGetterWrapper;

/**
 * Class QuizSetupQuestionGetterWrapperTest
 *
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
        
        $this->assertInstanceOf('\Acme\ModelBundle\Model\RecordsGetterWrapperAbstract', $this->objectToTest->getObjectWrapper());
    }
    
    public function testSetupObjectWrapperInput()
    {
        $this->objectToTest->setupObjectWrapperInput();
        
        $input = $this->objectToTest->getObjectWrapper()->getInput();
        
        $this->assertArrayHasKey('orderBy', $input);
        $this->assertArrayHasKey('groupBy', $input);
    }
}