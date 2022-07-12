<?php

namespace tuto\BackofficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use FOS\UserBundle\Util\LegacyFormHelper;

class AuteurType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('nom', 'text', array('required' => true));
        $builder->add('prenom', 'text', array('required' => true));
        $builder->add('email', 'email');
        $builder->add('Grade', 'entity', array('class' => 'tutoBackofficeBundle:Statut', 'choice_label' => 'libelle',));
        $builder->add('universite', 'text', array('required' => true));
        $builder->add('institution', 'text', array('required' => false));

        $builder->add('rang', 'integer', array('required' => true));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'tuto\BackofficeBundle\Entity\Auteur'
        ));
    }

    public function getAuteur() {
        return 'auteur';
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'tuto_backofficebundle_auteur';
    }

}
