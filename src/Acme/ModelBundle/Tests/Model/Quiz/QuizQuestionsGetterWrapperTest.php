<?php

namespace Acme\ReqBundle\Tests\Model\Quiz;

use Acme\ModelBundle\Tests\Model\TestSuite;;
use Acme\ModelBundle\Model\Quiz\QuizQuestionsGetter;
use Acme\ModelBundle\Model\Quiz\QuizQuestionsGetterWrapper;

/**
 * Class QuizQuestionGetterWrapperTest
 *
 * @author Andrea Fiori
 * @since  15 April 2014
 */
class QuizQuestionGetterWrapperTest extends TestSuite
{
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
