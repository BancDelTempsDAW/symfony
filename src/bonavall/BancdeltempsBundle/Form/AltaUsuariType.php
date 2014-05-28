<?php

namespace bonavall\BancdeltempsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AltaUsuariType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            
            ->add('nom', 'text', array(
                'label'=>'Nom'
            ))
            ->add('cognom', 'text', array(
                'label'=>'Cognoms'
            ))
            ->add('adreca', 'textarea', array(
                'label'=>'Adreça'
            ))
            ->add('password','password', array(
                'label'=>'Contrasenya'
            ))
            ->add('telefon', 'text', array(
                'label'=>'Telèfon'
            ))
            ->add('fotografia', 'file', array(
                'label'=>'Fotografia'
            ))
            ->add('presentacio', 'textarea', array(
                'label'=>'Presentació'
            ))
            ->add('punts', 'integer', array(
                'label'=>'Punts'
            ))
            ->add('isActive', 'checkbox', array(
                'label'=>'Rol'
            ))
            ->add('rol');

    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'bonavall\BancdeltempsBundle\Entity\Usuari'
        ));
    }


    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'bonavall_bancdeltempsbundle_altausuari';
    }
}
