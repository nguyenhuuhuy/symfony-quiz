<?php

namespace Acme\ReqBundle\Tests\Model\Quiz;

use Acme\ReqBundle\Tests\Model\TestSuite;
use Acme\ReqBundle\Model\Quiz\QuizPaginationRecordHelper;
use Acme\ReqBundle\Model\Quiz\QuizAnswersGetter;
use Acme\ReqBundle\Model\Quiz\QuizAnswersGetterWrapper;
use Acme\ReqBundle\Model\Quiz\QuizQuestionsGetter;
use Acme\ReqBundle\Model\Quiz\QuizQuestionsGetterWrapper;
use Acme\ReqBundle\Model\Quiz\QuizTagsGetter;
use Acme\ReqBundle\Model\Quiz\QuizTagsGetterWrapper;

/**
 * @author Andrea Fiori
 * @since  05 November 2014
 */
class QuizPaginationRecordHelperTest extends TestSuite
{
    private $objectToTest;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->objectToTest = new QuizPaginationRecordHelper($this->getQuizQuestionsRelationsMock());
    }

    public function testGetPagingRecord()
    {
        $this->assertInstanceOf('Acme\ReqBundle\Entity\QuizQuestionsRelations', $this->objectToTest->getPagingRecord());
        $this->assertInstanceOf('Acme\ReqBundle\Entity\QuizQuestions', $this->objectToTest->getPagingRecord()->getQuestion());
        $this->assertInstanceOf('Acme\ReqBundle\Entity\Topics', $this->objectToTest->getPagingRecord()->getTopic());
    }
    
    public function testSetupQuestion()
    {
        $this->objectToTest->setupQuestion(array('id' => 1, 'question' => 'What is this?'));
        
        $this->assertNotEmpty( $this->objectToTest->getRecord('question') );
    }
    
    public function testSetupAnswers()
    {
        $this->objectToTest->setupAnswers( new QuizAnswersGetterWrapper(new QuizAnswersGetter($this->getEntityManagerMock())) );
        
        $this->assertNotEmpty( $this->objectToTest->getRecord('answers') );
    }
    
    public function testSetupTopics()
    {
        $this->objectToTest->setupTopics( new QuizQuestionsGetterWrapper(new QuizQuestionsGetter($this->getEntityManagerMock())) );
        
        $this->assertNotEmpty($this->objectToTest->getRecord('topics',1));
    }
    
    /**
     * @expectedException Exception
     */
    public function testFormatTopicsRecordsThrowsException()
    {
        $this->objectToTest->formatTopicsRecords();
    }
    
    public function testFormatTopics()
    {
        $this->objectToTest->setupTopics( new QuizQuestionsGetterWrapper(new QuizQuestionsGetter($this->getEntityManagerMock())) );
        
        $this->objectToTest->setRecordElement('topics', $this->getQuizQuestionsRelationsMock());
        
        $this->objectToTest->formatTopicsRecords();
        
        $this->assertTrue(is_array($this->objectToTest->getRecord('topics',1)));
    }
    
    public function testSetupTags()
    {
        $this->objectToTest->setupTags( new QuizTagsGetterWrapper(new QuizTagsGetter($this->getEntityManagerMock())) );
        
        $this->assertTrue(is_array($this->objectToTest->getRecord('tags',1)));
    }
    
    /**
     * @expectedException Exception
     */
    public function testFormatTagsRecordsThrowsException()
    {
        $this->objectToTest->formatTagsRecords();
    }
    
    public function testFormatTagsRecords()
    {
        $this->objectToTest->setupTags( new QuizTagsGetterWrapper( new QuizTagsGetter($this->getEntityManagerMock()) ) );
        
        $this->objectToTest->setRecordElement('tags', $this->getQuizQuestionsRelationsMock());
        
        $this->objectToTest->formatTagsRecords();
        
        $this->assertTrue(is_array($this->objectToTest->getRecord('tags',1)));
    }

        /**
         * @return QuizQuestionsRelations
         */
        private function getQuizQuestionsRelationsMock()
        {
            $mockOjbect = $this->getMock('\Acme\ReqBundle\Entity\QuizQuestionsRelations');
            
            $mockOjbect->expects($this->any())
                       ->method('getQuestion')
                       ->will($this->returnValue($this->getQuizQuestionMock()));
            
            $mockOjbect->expects($this->any())
                       ->method('getTopic')
                       ->will($this->returnValue($this->getTopicsMock()));
            
            return $mockOjbect;
        }
        
        private function getQuizQuestionMock()
        {
            $mockOjbect = $this->getMock('\Acme\ReqBundle\Entity\QuizQuestions');
            
            $mockOjbect->expects($this->any())
                             ->method('getId')
                             ->will($this->returnValue(11));
            
            $mockOjbect->expects($this->any())
                             ->method('getId')
                             ->will($this->returnValue('PHP'));
            return $mockOjbect;
        }
        
        private function getTopicsMock()
        {
            $mockOjbect = $this->getMock('\Acme\ReqBundle\Entity\Topics');
            
            $mockOjbect->expects($this->any())
                       ->method('getId')
                       ->will($this->returnValue(12));
            
            return $mockOjbect;
        }
}