<?php

namespace Tests\AppBundle\Model\Quiz;

use ModelBundle\Model\Quiz\QuizQuestionsFromTagsGetter;
use Tests\ModelBundle\Model\TestSuite;

class QuizQuestionsFromTagsGetterTest extends TestSuite
{
    /**
     * @var QuizQuestionsFromTagsGetter
     */
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