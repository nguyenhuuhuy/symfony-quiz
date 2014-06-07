<?php

namespace Acme\QuizBundle\Tests\Model\Questions;

use Acme\QuizBundle\Tests\Model\TestSuite;

use Acme\QuizBundle\Model\QueryBuilderHelperAbstract;

/**
 * @author Andrea Fiori
 * @since  06 June 2014
 */
class QuestionsGetter extends QueryBuilderHelperAbstract
{
    public function setMainQuery()
    {
        $this->setSelectQueryFields('');

        $this->getQueryBuilder()->add('select', $this->getSelectQueryFields())
                                ->add('from', 'Acme\QuizBundle\Entity\QuizQuestons qq ')
                                ->where("qq.id != '' ");
        
        return $this->getQueryBuilder();
    }
}

/**
 * @author Andrea Fiori
 * @since  06 June 2014
 */
class QuestionsGetterTest extends TestSuite
{
    private $questionsGetter;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->questionsGetter = new QuestionsGetter($this->getEntityManagerMock());
    }
    
    public function testSetMainQuery()
    {
        $this->assertInstanceOf('\Doctrine\ORM\QueryBuilder', $this->questionsGetter->setMainQuery());
    }
}