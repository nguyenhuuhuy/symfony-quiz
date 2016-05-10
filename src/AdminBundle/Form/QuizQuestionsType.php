<?php

namespace Acme\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver;

class QuizQuestionsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('question')
            ->add('questionCode')
            ->add('comment')
            ->add('numberCorrectAnswers')
        ;
    }
    
    /**
     * @param object $resolver
     */
    public function setDefaultOptions($resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ModelBundle\Entity\QuizQuestions'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'modelbundle_quizquestions';
    }
}
