<?php

namespace Acme\ReqBundle\Tests\Model\Quiz;

use Acme\ReqBundle\Tests\Model\TestSuite;
use Acme\ModelBundle\Model\Quiz\QuizAnswersGetter;

/**
 * Class QuizAnswersGetterTest
 *
 * @author Andrea Fiori
 * @since  05 June 2014
 */
class QuizAnswersGetterTest extends TestSuite
{
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
