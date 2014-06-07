<?php

namespace Acme\QuizBundle\Tests\Model\Answers;

use Acme\QuizBundle\Tests\Model\TestSuite;
use Acme\QuizBundle\Model\Answers\AnswersGetter;
use Acme\QuizBundle\Model\Answers\AnswersGetterWrapper;

/**
 * @author Andrea Fiori
 * @since  06 June 2014
 */
class AnswersGetterWrapperTest extends TestSuite
{
    private $answersGetterWrapper;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->answersGetterWrapper = new AnswersGetterWrapper( new AnswersGetter($this->getEntityManagerMock()) );
    }
    
    public function testGetPostsGetter()
    {
        $this->assertTrue( $this->answersGetterWrapper->getAnswersGetter() instanceof AnswersGetter );
    }
    
    public function testGetRecords()
    {
        $this->answersGetterWrapper->setInput( array("questionId" => 1) );
        
        $this->assertTrue( is_array($this->answersGetterWrapper->getRecords()) );
    }
}