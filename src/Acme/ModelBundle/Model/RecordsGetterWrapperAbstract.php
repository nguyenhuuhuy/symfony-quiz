<?php

namespace Acme\ModelBundle\Model;

/**
 * @author Andrea Fiori
 * @since  29 May 2014
 */
abstract class RecordsGetterWrapperAbstract
{
    protected $input;
    
    protected $objectGetter;

    /**
     * @param array $input
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
     * @return types
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
     * @return \Acme\ReqBundle\Model\QueryBuilderHelperAbstract
     */
    public function setObjectGetter(QueryBuilderHelperAbstract $objectGetter)
    {
        $this->objectGetter = $objectGetter;
        
        return $this->objectGetter;
    }
    
    /**
     * @return \Acme\ModelBundle\Model\QueryBuilderHelperAbstract
     */
    public function getObjectGetter()
    {
        return $this->objectGetter;
    }

    /**
     * @return \Acme\ModelBundle\Model\QueryBuilderHelperAbstract
     * @throws NullException
     */
    public function getRecords()
    {
        if (!$this->objectGetter) {
            throw new NullException("ObjectGetter is not set");
        }
        
        return $this->objectGetter->getQueryResult();
    }
}
