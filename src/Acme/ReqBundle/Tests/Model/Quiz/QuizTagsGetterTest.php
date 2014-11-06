<?php

namespace Acme\ReqBundle\Tests\Model\Quiz;

use Acme\ReqBundle\Tests\Model\TestSuite;
use Acme\ReqBundle\Model\Quiz\QuizTagsGetter;

/**
 * @author Andrea Fiori
 * @since  08 October 2014
 */
class QuizTagsGetterTest extends TestSuite
{
    private $objectGetter;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->objectGetter = new QuizTagsGetter($this->getEntityManagerMock());
    }
    
    public function testSetMainQuery()
    {
        $this->assertInstanceOf('\Doctrine\ORM\QueryBuilder', $this->objectGetter->setMainQuery());
    }
    
    public function testSetQuestionId()
    {
        $this->objectGetter->setTagId(12);

        $this->assertNotEmpty($this->objectGetter->getQueryBuilder()->getParameter('tagId'));
    }
    
    public function testSetTagName()
    {
        $this->objectGetter->setTagName('PHP');
        
        $this->assertNotEmpty( $this->objectGetter->getQueryBuilder()->getParameter('tagName') );
    }
}