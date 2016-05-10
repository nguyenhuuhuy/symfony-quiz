<?php

namespace Acme\ModelBundle\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class QuizTagsRelationsEntityTest extends KernelTestCase
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

        $this->em = static::$kernel->getContainer()->get('doctrine')->getManager();
    }

    public function testGetClassName()
    {
        $className = $this->em->getRepository('ModelBundle:QuizTagsRelations')->getClassName();

        $this->assertEquals('ModelBundle\Entity\QuizTagsRelations', $className);
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