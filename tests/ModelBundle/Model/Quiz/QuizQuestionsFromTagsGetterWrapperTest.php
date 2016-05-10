<?php

namespace Tests\AppBundle\Model\Quiz;

use ModelBundle\Model\Quiz\QuizQuestionsFromTagsGetter;
use ModelBundle\Model\Quiz\QuizQuestionsFromTagsGetterWrapper;
use Tests\ModelBundle\Model\TestSuite;

class QuizQuestionsFromTagsGetterWrapperTest extends TestSuite
{
    /**
     * @var QuizQuestionsFromTagsGetterWrapper
     */
    private $objectGetterWrapper;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->objectGetterWrapper = new QuizQuestionsFromTagsGetterWrapper(
            new QuizQuestionsFromTagsGetter($this->getEntityManager())
        );
    }

    public function testSetupQueryBuilder()
    {
        $this->assertNull( $this->objectGetterWrapper->setupQueryBuilder() );
    }
}