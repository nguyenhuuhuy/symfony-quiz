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
    private $quizSetup;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->quizSetup = new QuizSetupQuestionGetterWrapper($this->getEntityManagerMock());
    }
    
    public function testSetObjectWrapper()
    {
        $this->quizSetup->setupObjectWrapper();
        
        $this->assertInstanceOf('\Acme\ReqBundle\Model\RecordsGetterWrapperAbstract', $this->quizSetup->getObjectWrapper());
    }
}