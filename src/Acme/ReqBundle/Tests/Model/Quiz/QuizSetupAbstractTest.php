<?php

namespace Acme\ReqBundle\Tests\Model\Quiz;

use Acme\ReqBundle\Tests\Model\TestSuite;

/**
 * @author Andrea Fiori
 * @since  04 November 2014
 */
class QuizSetupAbstractTest extends TestSuite
{
    private $quizSetupAbstract;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->quizSetupAbstract = $this->getMockForAbstractClass('\Acme\ModelBundle\Model\Quiz\QuizSetupAbstract', array( $this->getEntityManagerMock() ));
    }
    
    public function testSetTopic()
    {
        $this->quizSetupAbstract->setTopic('PHP');
        
        $this->assertEquals($this->quizSetupAbstract->getTopic(), 'PHP');
    }
    
    public function testSetTag()
    {
        $this->quizSetupAbstract->setTag('Variables');
        
        $this->assertEquals($this->quizSetupAbstract->getTag(), 'Variables');
    }
    
    public function testGetEntityManager()
    {
        $this->assertInstanceOf('\Doctrine\ORM\EntityManager', $this->quizSetupAbstract->getEntityManager());
    }
}