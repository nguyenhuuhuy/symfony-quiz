<?php

namespace Acme\QuizBundle\Tests\Model\Questions;

use Acme\QuizBundle\Tests\Model\TestSuite;
use Acme\QuizBundle\Model\Questions\QuestionsQueryGetter;

/**
 * @author Andrea Fiori
 * @since  06 June 2014
 */
class QuestionsQueryGetterTest extends TestSuite
{
    private $questionsQueryGetter;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->questionsQueryGetter = new QuestionsQueryGetter($this->getEntityManagerMock());
    }
    
    public function testGetQuery()
    {
        $this->assertTrue( is_object($this->questionsQueryGetter->getQuery() ) );
    }
}