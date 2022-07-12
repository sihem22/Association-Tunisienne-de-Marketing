<?php

namespace tuto\BackofficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvaluationFinalType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('note','textarea', array('required' => false))
                ->add('resultat', 'choice',array('choices' => array('Accepté sans modification' => 'Accepté sans modification','Accepté avec modifications mineures' => 'Accepté avec modifications mineures','Accepté avec modifications majeures' => 'Accepté avec modifications majeures', 'Refusé' => 'Refusé'), 'expanded' => false), array('required' => true))
                ->add('file1', 'file', array('required' => true))
                ->add('file2', 'file', array('required' => true))
                ->add('file3', 'file', array('required' => false));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'tuto\BackofficeBundle\Entity\EvaluationFinal'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'tuto_backofficebundle_evaluationfinal';
    }


}
