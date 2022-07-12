<?php

namespace tuto\BackofficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MembreorgType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('nom')
                ->add('universite')
                ->add('pole', 'text', array('required' => false))
                ->add('university', 'text', array('required' => false))
                ->add('Image', 'file', array('required' => false))
                ->add('FB', 'text', array('required' => false))
                ->add('twitter', 'text', array('required' => false))
                ->add('linkedin', 'text', array('required' => false));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'tuto\BackofficeBundle\Entity\Membreorg'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'tuto_backofficebundle_membreorg';
    }

}
