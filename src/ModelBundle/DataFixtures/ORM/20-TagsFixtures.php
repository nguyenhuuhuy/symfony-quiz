<?php

namespace ModelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ModelBundle\Entity\Tags;

/**
 * Fixtures for the Tags Entity
 */
class TagsFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 20;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $tags1 = new Tags();
        $tags1->setName('Sessions');
        $tags1->setSlug('sessions');

        $tags2 = new Tags();
        $tags2->setName('Cookies');
        $tags2->setSlug('cookies');

        $tags3 = new Tags();
        $tags3->setName('Array');
        $tags3->setSlug('array');

        $manager->persist($tags1);
        $manager->persist($tags2);
        $manager->persist($tags3);

        $manager->flush();
    }
}