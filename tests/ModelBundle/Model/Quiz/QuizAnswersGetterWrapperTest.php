<?php

namespace Tests\AppBundle\Model\Quiz;

use ModelBundle\Model\Quiz\QuizAnswersGetter;
use ModelBundle\Model\Quiz\QuizAnswersGetterWrapper;
use Tests\ModelBundle\Model\TestSuite;

class QuizAnswersGetterWrapperTest extends TestSuite
{
    /**
     * @var QuizAnswersGetterWrapper
     */
    private $objectGetterWrapper;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->objectGetterWrapper = new QuizAnswersGetterWrapper( new QuizAnswersGetter($this->getEntityManagerMock()) );
    }
    
    public function testSetupQueryBuilder()
    {
        $this->assertNull( $this->objectGetterWrapper->setupQueryBuilder() );
    }
}
