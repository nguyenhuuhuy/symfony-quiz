<?php

namespace Acme\ReqBundle\Tests\Model\Quiz;

use Acme\ReqBundle\Tests\Model\TestSuite;
use Acme\ReqBundle\Model\Quiz\QuizQuestionsGetter;

/**
 * @author Andrea Fiori
 * @since  06 June 2014
 */
class QuizQuestionsGetterTest extends TestSuite
{
    private $objectGetter;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->objectGetter = new QuizQuestionsGetter($this->getEntityManagerMock());
    }
    
    public function testSetMainQuery()
    {
        $this->assertInstanceOf('\Doctrine\ORM\QueryBuilder', $this->objectGetter->setMainQuery());
    }
    
    public function testSetQuestionId()
    {
        $this->assertInstanceOf('\Doctrine\ORM\QueryBuilder', $this->objectGetter->setQuestionId(1));
        $this->assertInstanceOf('\Doctrine\ORM\QueryBuilder', $this->objectGetter->setQuestionId(array(1,2,3)));
        $this->assertNotEmpty( $this->objectGetter->getQueryBuilder()->getParameter('questionId') );
    }
    
    public function testSetTopicName()
    {
        $this->objectGetter->setTopicName('PHP');
        
        $this->assertNotEmpty( $this->objectGetter->getQueryBuilder()->getParameter('topicName') );
    }
}
