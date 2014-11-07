<?php

namespace Acme\ReqBundle\Tests\Model\Quiz;

use Acme\ReqBundle\Tests\Model\TestSuite;
use Acme\ReqBundle\Model\Quiz\QuizQuestionsFromTagsGetter;

/**
 * @author Andrea Fiori
 * @since  07 November 2014
 */
class QuizQuestionsFromTagsGetterTest extends TestSuite
{
    private $objectGetter;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->objectGetter = new QuizQuestionsFromTagsGetter($this->getEntityManager());
    }
    
    public function testSetMainQuery()
    {
        $this->assertInstanceOf('\Doctrine\ORM\QueryBuilder', $this->objectGetter->setMainQuery());
    }
    
    public function testSetTagName()
    {
        $this->objectGetter->setTagName('PHP');
        
        $this->assertNotEmpty( $this->objectGetter->getQueryBuilder()->getParameter('tagName') );
    }
}