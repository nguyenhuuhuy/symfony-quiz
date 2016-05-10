<?php

namespace ModelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ModelBundle\Entity\Topics;

/**
 * Fixtures for the Topics Entity
 */
class TopicsFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 30;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $topics1 = new Topics();
        $topics1->setName('PHP');
        $topics1->setSlug('php');

        $topics2 = new Topics();
        $topics2->setName('HTML5');
        $topics2->setSlug('html5');

        $topics3 = new Topics();
        $topics3->setName('Java');
        $topics3->setSlug('java');

        $manager->persist($topics1);
        $manager->persist($topics2);
        $manager->persist($topics3);

        $manager->flush();
    }
}