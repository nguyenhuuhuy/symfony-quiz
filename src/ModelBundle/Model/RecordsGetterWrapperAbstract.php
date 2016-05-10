<?php

namespace ModelBundle\Model;

abstract class RecordsGetterWrapperAbstract
{
    protected $input;

    /**
     * @var \ModelBundle\Model\QueryBuilderHelperAbstract
     */
    protected $objectGetter;

    /**
     * @param array $input
     *
     * @return array
     */
    public function setInput(array $input)
    {
        $this->input = $input;
        
        return $this->input;
    }
    
    /**
     * 
     * @param string $key
     * @param 0|1|array
     *
     * @return mixed
     */
    public function getInput($key = null, $noArray = null)
    {
        if ( isset($this->input[$key]) ) {
            return $this->input[$key];
        }

        if (!$noArray) {
            return $this->input;
        }
    }
    
    abstract public function setupQueryBuilder();
    
    /**
     * @return \ModelBundle\Model\QueryBuilderHelperAbstract
     */
    public function setObjectGetter(QueryBuilderHelperAbstract $objectGetter)
    {
        $this->objectGetter = $objectGetter;
        
        return $this->objectGetter;
    }
    
    /**
     * @return \ModelBundle\Model\QueryBuilderHelperAbstract
     */
    public function getObjectGetter()
    {
        return $this->objectGetter;
    }

    /**
     * @return \ModelBundle\Model\QueryBuilderHelperAbstract
     *
     * @throws \Exception
     */
    public function getRecords()
    {
        if (!$this->objectGetter) {
            throw new \Exception("ObjectGetter is not set");
        }
        
        return $this->objectGetter->getQueryResult();
    }
}
