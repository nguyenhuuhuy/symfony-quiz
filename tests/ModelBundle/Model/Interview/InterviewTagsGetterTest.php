<?php

namespace Acme\ModelBundle\Tests\Model\Interview;

use ModelBundle\Model\Interview\InterviewTagsGetter;
use Tests\ModelBundle\Model\TestSuite;

class InterviewTagsGetterTest extends TestSuite
{
    /**
     * @var InterviewTagsGetter
     */
    private $objectGetter;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->objectGetter = new InterviewTagsGetter($this->getEntityManager());
    }

    public function testSetMainQuery()
    {
        $this->assertInstanceOf('\Doctrine\ORM\QueryBuilder', $this->objectGetter->setMainQuery());
    }

    public function testSetQuestionId()
    {
        $this->objectGetter->setQuestionId(11);

        $this->assertNotEmpty( $this->objectGetter->getQueryBuilder()->getParameter('questionId') );
    }
}
