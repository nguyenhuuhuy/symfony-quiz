<?php

namespace Acme\ReqBundle\Tests\Model\Quiz;

use Acme\ReqBundle\Tests\Model\TestSuite;
use Acme\ReqBundle\Model\Quiz\QuizQuestionsFromTagsGetter;
use Acme\ReqBundle\Model\Quiz\QuizQuestionsFromTagsGetterWrapper;

/**
 * @author Andrea Fiori
 * @since  07 November 2014
 */
class QuizQuestionsFromTagsGetterWrapperTest extends TestSuite
{
    private $objectGetterWrapper;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->objectGetterWrapper = new QuizQuestionsFromTagsGetterWrapper(new QuizQuestionsFromTagsGetter($this->getEntityManager()));
    }
    
    
}