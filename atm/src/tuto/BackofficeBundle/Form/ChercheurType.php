<?php

namespace tuto\BackofficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use FOS\UserBundle\Util\LegacyFormHelper;




class ChercheurType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom', 'text', array('required' => true))
                ->add('adressemail', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\EmailType'), array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
        
       ->add('civilite', 'choice',array('choices' => array('Mr' => 'Mr', 'Mme' => 'Mme'), 'expanded' => false), array('required' => true));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'tuto\BackofficeBundle\Entity\Chercheur'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'tuto_backofficebundle_chercheur';
    }


}
