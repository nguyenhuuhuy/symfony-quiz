<?php

namespace Acme\ReqBundle\Tests\Model\Topics;

use Acme\ModelBundle\Model\Topics\TopicsGetter;
use Acme\ModelBundle\Model\Topics\TopicsGetterWrapper;
use Acme\ModelBundle\Model\Topics\TopicsTreeSetup;
use Acme\ModelBundle\Tests\Model\TestSuite;;

/**
 * @author Andrea Fiori
 * @since  18 October 2014
 */
class TopicsTreeSetupTest extends TestSuite
{
    private $topicsTreeSetup;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->topicsTreeSetup = new TopicsTreeSetup();
    }
    
    /**
     * @expectedException Exception
     */
    public function testSetupTopicsFromDbThrowException()
    {
        $this->topicsTreeSetup->setupTopicsFromDb();
    }
    
    public function testSetupTopicsFromDb()
    {
        $this->topicsTreeSetup->setTopicsGetterWrapper( new TopicsGetterWrapper(new TopicsGetter($this->getEntityManagerMock())) );
        
        $this->assertTrue( is_array($this->topicsTreeSetup->setupTopicsFromDb()) );
    }
    
    public function testSetupRecordsTree()
    {
        $this->topicsTreeSetup->setRecords( array(
            1 => array(
                'id'   => 1,
                'name' => 'Development',
                'parentId' => 0
            ),
            2 => array(
                'id'   => 2,
                'name' => 'PHP',
                'parentId' => 1
            )
        ));
        
        $arrayTree = $this->topicsTreeSetup->setupRecordsTree();
        
        $this->assertTrue( !empty($arrayTree) );
    }
}