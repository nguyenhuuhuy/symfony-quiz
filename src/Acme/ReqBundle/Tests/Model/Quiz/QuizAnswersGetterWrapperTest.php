<?php

namespace Acme\ReqBundle\Tests\Model\Quiz;

use Acme\ReqBundle\Tests\Model\TestSuite;
use Acme\ModelBundle\Model\Quiz\QuizAnswersGetter;
use Acme\ModelBundle\Model\Quiz\QuizAnswersGetterWrapper;

/**
 * @author Andrea Fiori
 * @since  06 June 2014
 */
class QuizAnswersGetterWrapperTest extends TestSuite
{
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
