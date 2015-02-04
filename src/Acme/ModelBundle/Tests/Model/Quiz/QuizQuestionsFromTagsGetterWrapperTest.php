<?php

namespace Acme\ReqBundle\Tests\Model\Quiz;

use Acme\ModelBundle\Tests\Model\TestSuite;;
use Acme\ModelBundle\Model\Quiz\QuizQuestionsFromTagsGetter;
use Acme\ModelBundle\Model\Quiz\QuizQuestionsFromTagsGetterWrapper;

/**
 * Class QuizQuestionsFromTagsGetterWrapperTest
 *
 * @author Andrea Fiori
 * @since  07 November 2014
 */
class QuizQuestionsFromTagsGetterWrapperTest extends TestSuite
{
    private $objectGetterWrapper;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->objectGetterWrapper = new QuizQuestionsFromTagsGetterWrapper(new QuizQuestionsFromTagsGetter($this->getEntityManager()));
    }

    public function testSetupQueryBuilder()
    {
        $this->assertNull( $this->objectGetterWrapper->setupQueryBuilder() );
    }
}