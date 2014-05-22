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
            //->add('salt')
            ->add('email', 'email', array(
                'label'=>'Correu Electrònic'
            ))
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
            //->add('poblacio')
            //->add('codi_postal')
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'bonavall\BancdeltempsBundle\Entity\Usuari'
        );
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
