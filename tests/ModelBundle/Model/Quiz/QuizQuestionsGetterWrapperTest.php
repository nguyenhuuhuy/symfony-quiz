<?php

namespace Tests\AppBundle\Model\Quiz;

use ModelBundle\Model\Quiz\QuizQuestionsGetter;
use ModelBundle\Model\Quiz\QuizQuestionsGetterWrapper;
use Tests\ModelBundle\Model\TestSuite;

class QuizQuestionGetterWrapperTest extends TestSuite
{
    /**
     * @var QuizQuestionsGetterWrapper
     */
    private $objectWrapper;
    
    protected function setUp()
    {
        parent::setUp();

        $this->objectWrapper = new QuizQuestionsGetterWrapper( new QuizQuestionsGetter( $this->getEntityManagerMock() ) );
    }

    public function testSetupQueryBuilder()
    {
        $this->assertNull( $this->objectWrapper->setupQueryBuilder() );
    }
}
