<?php

namespace Acme\QuizBundle\Model\Answers;

use Acme\QuizBundle\Tests\Model\TestSuite;
use Acme\QuizBundle\Model\Answers\QuestionGetter;


class QuestionGetterWrapper
{
    private $questionGetter;
    
    public function __construct(QuestionGetter $questionGetter)
    {
        $this->questionGetter = $questionGetter;
    }
    
}

/**
 * @author Andrea Fiori
 * @since  15 April 2014
 */
class QuestionGetterWrapperTest //extends TestSuite
{
    private $questionGetterWrapper;
    
    protected function setUp()
    {
        parent::setUp();

        $this->questionGetterWrapper = new QuestionGetterWrapper( new QuestionGetter( $this->getEntityManagerMock() ) );
    }
    
    public function testSetInput()
    {
        $this->questionGetterWrapper->setInput( array("id" => 1) );
        
        $this->assertTrue( is_array($this->questionGetterWrapper->getInput()) );
    }

    public function testGetPostsGetter()
    {
        $this->assertTrue( $this->questionGetterWrapper->getPostsGetter() instanceof PostsGetter );
    }
    
    public function testGetRecords()
    {
        $this->questionGetterWrapper->setInput( array("id" => 1) );
        
        $this->assertTrue( is_array($this->questionGetterWrapper->getRecords()) );
    }
}
