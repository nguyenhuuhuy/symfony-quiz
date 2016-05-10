<?php

namespace Tests\AppBundle\Model\Quiz;

use ModelBundle\Model\Quiz\QuizTagsGetter;
use Tests\ModelBundle\Model\TestSuite;

class QuizTagsGetterTest extends TestSuite
{
    /**
     * @var QuizTagsGetter
     */
    private $objectGetter;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->objectGetter = new QuizTagsGetter($this->getEntityManagerMock());
    }
    
    public function testSetQuestionId()
    {
        $this->objectGetter->setTagId(12);

        $this->assertNotEmpty($this->objectGetter->getQueryBuilder()->getParameter('tagId'));
    }
    
    public function testSetTagId()
    {
        $this->objectGetter->setTagId(12);
        
        $this->assertNotEmpty( $this->objectGetter->getQueryBuilder()->getParameter('tagId') );
    }
    
    public function testSetTagName()
    {
        $this->objectGetter->setTagName('PHP');
        
        $this->assertNotEmpty( $this->objectGetter->getQueryBuilder()->getParameter('tagName') );
    }
}