<?php

namespace Acme\ModelBundle\Model\Quiz;

use Acme\ModelBundle\Model\RecordsGetterWrapperAbstract;

/**
 * Class QuizSetupQuestionGetterWrapper
 *
 * @author Andrea Fiori
 * @since  04 November 2014
 */
class QuizSetupQuestionGetterWrapper extends QuizSetupAbstract
{
    /**
     * @var RecordsGetterWrapperAbstract $objectWrapper
     */
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
        $this->assertObjectWrapper();
        
        if (!empty($input)) {
            $this->getObjectWrapper()->setInput($input);
        } elseif ($this->getTag()) {
            $this->getObjectWrapper()->setInput(array('slug' => $this->getTag()));
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
        $this->assertObjectWrapper();
        $this->assertObjectWrapperInput();
        $this->getObjectWrapper()->setupQueryBuilder();
    }
        /**
         * Ensure a wrapper object is set
         */
        private function assertObjectWrapper()
        {
            if (!$this->getObjectWrapper()) {
                $this->setupObjectWrapper();
            }
        }
        
        /**
         * Ensure the wrapper object input is set
         */
        private function assertObjectWrapperInput()
        {
            if (!$this->getObjectWrapper()->getInput()) {
                $this->setupObjectWrapperInput();
            }
        }
    
    /**
     * @param RecordsGetterWrapperAbstract $objectWrapper
     * @return RecordsGetterWrapperAbstract $objectWrapper
     */
    public function setObjectWrapper(RecordsGetterWrapperAbstract $objectWrapper)
    {
        $this->objectWrapper = $objectWrapper;
        
        return $this->objectWrapper;
    }
    
    /**
     * @return RecordsGetterWrapperAbstract $objectWrapper
     */
    public function getObjectWrapper()
    {
        return $this->objectWrapper;
    }
}
