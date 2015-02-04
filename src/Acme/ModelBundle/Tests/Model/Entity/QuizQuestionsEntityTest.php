<?php

namespace Acme\ModelBundle\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * @author Andrea Fiori
 * @since  04 February 2015
 */
class QuizQuestionsEntityTest extends KernelTestCase
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
        $className = $this->em->getRepository('ModelBundle:QuizQuestionsRelations')
            ->getClassName()
        ;

        $this->assertEquals('Acme\ModelBundle\Entity\QuizQuestionsRelations', $className);
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