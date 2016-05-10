<?php

namespace Acme\ReqBundle\Tests\Model\Quiz;

use ModelBundle\Model\Quiz\QuizAnswersGetter;
use Tests\ModelBundle\Model\TestSuite;

class QuizAnswersGetterTest extends TestSuite
{
    /**
     * @var QuizAnswersGetter
     */
    private $objectGetter;
 
    protected function setUp()
    {
        parent::setUp();
        
        $this->objectGetter = new QuizAnswersGetter($this->getEntityManager());
    }

    public function testSetMainQuery()
    {
        $this->assertInstanceOf('\Doctrine\ORM\QueryBuilder', $this->objectGetter->setMainQuery());
    }
    
    public function testSetQuestionId()
    {
        $this->objectGetter->setQuestionId(1);

        $this->assertNotEmpty( $this->objectGetter->getQueryBuilder()->getParameter('questionId') );
    }

    public function testSetQuestionIdWithArrayInput()
    {
        $this->objectGetter->setQuestionId(array(1,2,3));

        $this->assertNotEmpty( $this->objectGetter->getQueryBuilder()->getParameter('questionId') );
    }
}
