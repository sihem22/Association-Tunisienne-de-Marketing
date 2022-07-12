<?php

namespace tuto\BackofficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use FOS\UserBundle\Util\LegacyFormHelper;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
class UserType extends AbstractType
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
         $builder->add('plainPassword', 'repeated', array(
            'type' => 'password',
        ))
        ->getForm()
    ;

       
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
    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

 public function getParent() {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }
public function getNomEtPrenom() {
        return $this->getBlockPrefix();
    }

    public function getDateNaissance() {
        return $this->getBlockPrefix();
    }

    public function getCivilite() {
        return $this->getBlockPrefix();
    }

   

    public function getImage() {
        return $this->getBlockPrefix();
    }

   

   
}
