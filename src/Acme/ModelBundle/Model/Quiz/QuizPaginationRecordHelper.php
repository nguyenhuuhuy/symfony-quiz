<?php

namespace Acme\ModelBundle\Model\Quiz;

use Acme\ModelBundle\Entity\QuizQuestionsRelations;
use Exception;

/**
 * @author Andrea Fiori
 * @since  05 November 2014
 */
class QuizPaginationRecordHelper
{
    /** @var QuizQuestionsRelations **/
    private $pagingRecord;
    
    /** @var record to return */
    private $record = array();
    
    /**
     * @param object $pagingRecord
     */
    public function __construct($pagingRecord)
    {
        $this->pagingRecord = $pagingRecord;
    }
    
    /**
     * @return QuizQuestionsRelations $pagingRecord
     */
    public function getPagingRecord()
    {
        return $this->pagingRecord;
    }

    /**     
     * @param array $questionEntityArray
     */
    public function setupQuestion(array $questionEntityArray)
    {
        $this->record['question'] = $questionEntityArray;
    }
    
    /**
     * 
     * @param QuizAnswersGetterWrapper $wrapper
     * @return array
     */
    public function setupAnswers(QuizAnswersGetterWrapper $wrapper)
    {
        $wrapper->setInput( array( 'questionId' => $this->getPagingRecord()->getQuestion()->getId() ) );

        $wrapper->setupQueryBuilder();

        $this->record['answers'] = $wrapper->getRecords();
        
        return $this->record['answers'];
    }
    
    /**
     * @param QuizQuestionsGetterWrapper $wrapper
     * @return array
     */
    public function setupTopics(QuizQuestionsGetterWrapper $wrapper)
    {
        $wrapper->setInput( array(
                'fields'     => 'qqr, qt',
                'groupBy'    => 'qqr.topic',
                'questionId' => $this->getPagingRecord()->getQuestion()->getId()
            )
        );
        $wrapper->setupQueryBuilder();
        
        $this->record['topics'] = $wrapper->getRecords();
        
        return $this->record['topics'];
    }
    
    /**
     * @return array
     * @throws Exception
     */
    public function formatTopicsRecords()
    {
        if (!isset($this->record['topics'])) {
            throw new Exception("Topics records are not set");
        }
        
        $topicsList = array();
        foreach($this->record['topics'] as $topic) {
            $topicsList[] = $topic->getTopic()->getName();
        }
        
        $this->record['topics'] = $topicsList;
         
        return $this->record['topics'];
    }
    
    /**
     * @param Quiz\QuizTagsGetterWrapper $wrapper
     * @return array|null
     */
    public function setupTags(QuizTagsGetterWrapper $wrapper)
    {
        $wrapper->setInput( array( "questionId" => $this->getPagingRecord()->getQuestion()->getId() ) );
        
        $wrapper->setupQueryBuilder();
             
        $this->record['tags'] = $wrapper->getRecords();
        
        return $this->record['tags'];
    }
    
    /**
     * @param QuizQuestionsRelations $records
     * @return array|null
     */
    public function formatTagsRecords()
    {
        if (!isset($this->record['tags'])) {
            throw new Exception("Tags records are not set");
        }
        
        $tagList = array();
        foreach($this->record['tags'] as $tag) {
            $tagList[] = $tag->getTag()->getName();
        }
        
        $this->record['tags'] = $tagList;
        
        return $this->record['tags'];
    }
    
    /**
     * @param string $key
     * @param bool $noArray
     * @return mixed
     */
    public function getRecord($key = null, $noArray = null)
    {
        if (isset($this->record[$key])) {
            return $this->record[$key];
        }
        
        if (!$noArray) {
            return $this->record;
        }
    }
    
    /**
     * @param mixed $key
     * @param mixed $value
     */
    public function setRecordElement($key, $value)
    {
        $this->record[$key] = $value;
    }
}
