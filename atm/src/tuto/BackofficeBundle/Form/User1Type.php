<?php

namespace tuto\BackofficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use FOS\UserBundle\Util\LegacyFormHelper;

class User1Type extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder->add('Nom', 'text', array('required' => true));
        $builder->add('Prenom', 'text', array('required' => true));

        
        $builder->add('Image', 'file', array('required' => false));
       
        $builder->add('Civilite', 'choice',array('choices' => array('Mr' => 'Mr', 'Mme' => 'Mme'), 'expanded' => false), array('required' => true));
        $builder->add('Statut', 'entity', array('class' => 'tutoBackofficeBundle:Statut', 'choice_label' => 'libelle',), array('required' => true));
        $builder->add('Discipline', 'text', array('required' => true));
       $builder->add('Universite', 'text', array('required' => true));
        $builder->add('Institution', 'text', array('required' => true));
        $builder->add('Pays', 'entity', array('class' => 'tutoBackofficeBundle:Pays', 'choice_label' => 'nomFrFr',), array('required' => true));
        
       
    }
       
    
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'tuto\BackofficeBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
   


   

   
}
