<?php

namespace Acme\QuizBundle\Tests\Model\Answers;

use Acme\QuizBundle\Tests\Model\TestSuite;
use Acme\QuizBundle\Model\Answers\AnswersGetter;

/**
 * @author Andrea Fiori
 * @since  05 June 2014
 */
class AnswersGetterTest extends TestSuite
{
    private $answersGetter;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->answersGetter = new AnswersGetter($this->getEntityManager());
    }

    public function testSetMainQuery()
    {
        $this->assertInstanceOf('\Doctrine\ORM\QueryBuilder', $this->answersGetter->setMainQuery());
    }
    
    public function testSetQuestionId()
    {
        $this->assertInstanceOf('\Doctrine\ORM\QueryBuilder', $this->answersGetter->setQuestionId(1));
        $this->assertInstanceOf('\Doctrine\ORM\QueryBuilder', $this->answersGetter->setQuestionId(array(1,2,3)));
        $this->assertNotEmpty( $this->answersGetter->getQueryBuilder()->getParameter('questionId') );
    }
}