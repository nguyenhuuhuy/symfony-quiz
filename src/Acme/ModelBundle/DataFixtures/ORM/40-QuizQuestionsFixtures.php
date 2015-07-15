<?php

namespace Acme\ModelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\ModelBundle\Entity\QuizQuestions;

/**
 * Fixtures for the QuizQuestions Entity
 */
class QuizQuestionsFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 40;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $quizQuestions1 = new QuizQuestions();
        $quizQuestions1->setQuestion('What is the output of the following code?');
        $quizQuestions1->setNumberCorrectAnswers(1);

        $quizQuestions2 = new QuizQuestions();
        $quizQuestions2->setQuestion('What of the following sentences are correct?');
        $quizQuestions2->setNumberCorrectAnswers(3);

        $quizQuestions3 = new QuizQuestions();
        $quizQuestions3->setQuestion('What are the Array Iterator methods?');
        $quizQuestions3->setNumberCorrectAnswers(4);

        $manager->persist($quizQuestions1);
        $manager->persist($quizQuestions2);
        $manager->persist($quizQuestions3);

        $manager->flush();
    }
}