<?php

namespace tuto\BackofficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('libelle', 'text')
                ->add('TypeQuestion', 'choice', array(
                    'choices' => array(
                        'text' => 'Text',
                       
                        
                       
                        'radiobox' => 'radiobox',
                        'textarea' => 'textarea',
                        
                    ),
                        ))
                ->add('ValeursDefault')
        ;
    }
    
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'tuto\BackofficeBundle\Entity\Question'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'tuto_backofficebundle_question';
    }


}
