<?php

namespace Acme\ReqBundle\Tests\Model\Quiz;

use Acme\ReqBundle\Tests\Model\TestSuite;
use Acme\ReqBundle\Model\Quiz\QuizQuestionsGetter;
use Acme\ReqBundle\Model\Quiz\QuizQuestionsGetterWrapper;

/**
 * @author Andrea Fiori
 * @since  15 April 2014
 */
class QuizQuestionGetterWrapperTest extends TestSuite
{
    private $objectWrapper;
    
    protected function setUp()
    {
        parent::setUp();

        $this->objectWrapper = new QuizQuestionsGetterWrapper( new QuizQuestionsGetter( $this->getEntityManagerMock() ) );
    }
    
    public function testSetInput()
    {
        $this->objectWrapper->setInput( array("id" => 1) );
        
        $this->assertTrue( is_array($this->objectWrapper->getInput()) );
    }
    
    public function testSetupQueryBuilder()
    {
        $this->assertNull( $this->objectWrapper->setupQueryBuilder() );
    }
}
