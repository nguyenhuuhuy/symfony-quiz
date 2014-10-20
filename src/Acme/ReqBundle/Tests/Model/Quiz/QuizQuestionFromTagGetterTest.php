<?php

namespace Acme\ReqBundle\Tests\Model\Quiz;

use Acme\ReqBundle\Tests\Model\TestSuite;
use Acme\ReqBundle\Tests\Model\Questions\QuestionsFromTagGetter;

/**
 * @author Andrea Fiori
 * @since  08 October 2014
 */
class QuestionsFromTagGetterTest // extends TestSuite
{
    private $objectGetter;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->objectGetter = new QuestionsFromTagGetter($this->getEntityManagerMock());
    }
    
}
