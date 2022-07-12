<?php

namespace tuto\BackofficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('titre');
        $builder->add('motcle');
        $builder->add('annee', 'entity', array('class' => 'tutoBackofficeBundle:Annee', 'choice_label' => 'libelle',), array('required' => true));

        $builder->add('Type', 'entity', array('class' => 'tutoBackofficeBundle:Type', 'choice_label' => 'libelle',), array('required' => true));

        $builder->add('file1', 'file', array('required' => true));
         $builder->add('auteurs');
       
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'tuto\BackofficeBundle\Entity\Article'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'tuto_backofficebundle_article';
    }

}
