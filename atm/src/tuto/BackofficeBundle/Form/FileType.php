<?php

namespace tuto\BackofficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FileType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder->add('file1', 'file', array('required' => false));
        $builder->add('file2', 'file', array('required' => false));
        $builder->add('file3', 'file', array('required' => false));
        $builder->add('file4', 'file', array('required' => false));
        $builder->add('file5', 'file', array('required' => false));
        $builder->add('file6', 'file', array('required' => false));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'tuto\BackofficeBundle\Entity\File'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'tuto_backofficebundle_file';
    }


}
