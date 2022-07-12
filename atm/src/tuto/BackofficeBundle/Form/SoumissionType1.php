<?php

namespace tuto\BackofficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SoumissionType1 extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('titrePapier');
        $builder->add('resume', 'textarea', array('attr' => array('cols' => '89')));
        $builder->add('motcle');
        $builder->add('file1', 'file', array('required' => true));
        $builder->add('file2', 'file', array('required' => true));
        $builder->add('evaluateur');
        $builder->add('auteurs', 'collection', array(
            'type' => new AuteurType(),
            'allow_add' => true,
            'allow_delete' => true,
            'by_reference' => false,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'tuto\BackofficeBundle\Entity\Soumission'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'tuto_backofficebundle_soumission';
    }

}
