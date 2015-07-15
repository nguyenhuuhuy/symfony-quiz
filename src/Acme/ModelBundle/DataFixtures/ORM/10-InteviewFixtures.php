<?php

namespace Acme\ModelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\ModelBundle\Entity\Interview;

/**
 * Fixtures for the Interview Entity
 */
class InteviewFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 10;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $interview1 = new Interview();
        $interview1->setQuestion('What is PHP?');
        $interview1->setAnswer('PHP is a popular general-purpose scripting language that is especially suited to web development.');

        $interview2 = new Interview();
        $interview2->setQuestion('What is Java?');
        $interview2->setQuestion('Java is a programming language');

        $interview3 = new Interview();
        $interview3->setQuestion('What is HTML?');
        $interview3->setQuestion('Hyper Text Markup Language?');

        $manager->persist($interview1);
        $manager->persist($interview2);
        $manager->persist($interview3);

        $manager->flush();
    }
}