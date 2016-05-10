<?php

namespace Tests\AppBundle\Model\Quiz;

use ModelBundle\Model\Quiz\QuizPaginationRecordHelper;
use ModelBundle\Model\Quiz\QuizAnswersGetter;
use ModelBundle\Model\Quiz\QuizAnswersGetterWrapper;
use ModelBundle\Model\Quiz\QuizQuestionsGetter;
use ModelBundle\Model\Quiz\QuizQuestionsGetterWrapper;
use ModelBundle\Model\Quiz\QuizTagsGetter;
use ModelBundle\Model\Quiz\QuizTagsGetterWrapper;
use Tests\ModelBundle\Model\TestSuite;

class QuizPaginationRecordHelperTest extends TestSuite
{
    /**
     * @var QuizPaginationRecordHelper
     */
    private $objectToTest;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->objectToTest = new QuizPaginationRecordHelper($this->getQuizQuestionsRelationsMock());
    }

    public function testGetPagingRecord()
    {
        $this->assertInstanceOf('ModelBundle\Entity\QuizQuestionsRelations', $this->objectToTest->getPagingRecord());
        $this->assertInstanceOf('ModelBundle\Entity\QuizQuestions', $this->objectToTest->getPagingRecord()->getQuestion());
        $this->assertInstanceOf('ModelBundle\Entity\Topics', $this->objectToTest->getPagingRecord()->getTopic());
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
     * @expectedException \Exception
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
     * @expectedException \Exception
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
         * @return \ModelBundle\Entity\QuizQuestionsRelations
         */
        private function getQuizQuestionsRelationsMock()
        {
            $mockOjbect = $this->getMock('\ModelBundle\Entity\QuizQuestionsRelations');
            
            $mockOjbect->expects($this->any())
                       ->method('getQuestion')
                       ->will($this->returnValue($this->getQuizQuestionMock()));
            
            $mockOjbect->expects($this->any())
                       ->method('getTopic')
                       ->will($this->returnValue($this->getTopicsMock()));
            
            return $mockOjbect;
        }

        /**
         * @return \ModelBundle\Entity\QuizQuestions
         */
        private function getQuizQuestionMock()
        {
            $mockOjbect = $this->getMock('\ModelBundle\Entity\QuizQuestions');
            
            $mockOjbect->expects($this->any())
                             ->method('getId')
                             ->will($this->returnValue(11));
            
            $mockOjbect->expects($this->any())
                             ->method('getId')
                             ->will($this->returnValue('PHP'));
            return $mockOjbect;
        }

        /**
         * @return \ModelBundle\Entity\Topics
         */
        private function getTopicsMock()
        {
            $mockOjbect = $this->getMock('\ModelBundle\Entity\Topics');
            
            $mockOjbect->expects($this->any())
                       ->method('getId')
                       ->will($this->returnValue(12));
            
            return $mockOjbect;
        }
}