<?php

namespace Acme\ReqBundle\Model\Quiz;

use Acme\ReqBundle\Model\RecordsGetterWrapperAbstract;

/**
 * @author Andrea Fiori
 * @since  04 November 2014
 */
class QuizSetupQuestionGetterWrapper extends QuizSetupAbstract
{
    private $objectWrapper;
    
    public function setupObjectWrapper()
    {
        if ($this->getObjectWrapper()) {
            return false;
        }
        
        if ($this->getTag()) {
            $this->setObjectWrapper(new QuizQuestionsFromTagsGetterWrapper(new QuizQuestionsFromTagsGetter($this->getEntityManager())));
        } else {
            $this->setObjectWrapper(new QuizQuestionsGetterWrapper(new QuizQuestionsGetter($this->getEntityManager())));
        }
    }
    
    /**
     * @param array|null $input
     */
    public function setupObjectWrapperInput($input = array())
    {
        if (!empty($input)) {
            $this->getObjectWrapper()->setInput($input);
        } elseif ($this->getTag()) {
            $this->getObjectWrapper()->setInput(array('tagName' => $this->getTag()));
        } else {
            $this->getObjectWrapper()->setInput(array(
                    'topicName' => $this->getTopic(),
                    'orderBy' => 'qq.id',
                    'groupBy' => 'qq.id'
                )
            );
        }
    }
    
    public function setupObjectWrapperQueryBuilder()
    {
        $this->getObjectWrapper()->setupQueryBuilder();
    }

        private function assertObjectWrapper()
        {
            if (!$this->getObjectWrapper()) {
                $this->setupObjectWrapper();
            }
        }
        
        private function assertObjectWrapperInput()
        {
            $this->assertObjectWrapper();
            
            if (!$this->getObjectWrapper()->getInput()) {
                $this->setupObjectWrapperInput();
            }
        }
    
    /**
     * @param RecordsGetterWrapperAbstract $objectWrapper
     */
    public function setObjectWrapper(RecordsGetterWrapperAbstract $objectWrapper)
    {
        $this->objectWrapper = $objectWrapper;
    }
    
    /**
     * @return RecordsGetterWrapperAbstract $objectWrapper
     */
    public function getObjectWrapper()
    {
        return $this->objectWrapper;
    }
}
