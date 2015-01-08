<?php

namespace Acme\ReqBundle\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class QuizQuestionsRelationsFunctionalTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        self::bootKernel();
        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager()
        ;
    }

    public function testGetClassName()
    {
        $id = $this->em->getRepository('ModelBundle:QuizQuestionsRelations')
                       ->getClassName()
        ;

        $this->assertEquals('Acme\ModelBundle\Entity\QuizQuestionsRelations', $id);
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();
        $this->em->close();
    }
}