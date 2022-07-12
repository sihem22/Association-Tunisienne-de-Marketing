<?php

namespace tuto\BackofficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaysType extends AbstractType
{
/**
 * {@inheritdoc}
 */
public function buildForm(FormBuilderInterface $builder, array $options)
{
$builder->add('code', 'integer', array('required' => true));
$builder->add('alpha2', 'text', array('required' => true));
$builder->add('alpha3', 'text', array('required' => true));
$builder->add('nomEnGb', 'text', array('required' => true));
$builder->add('nomFrFr', 'text', array('required' => true));
}
/**
 * {@inheritdoc}
 */
public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults(array(
'data_class' => 'tuto\BackofficeBundle\Entity\Pays'
));
}

/**
 * {@inheritdoc}
 */
public function getBlockPrefix()
{
return 'tuto_backofficebundle_pays';
}


}
