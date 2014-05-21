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
            /*->add('nom', 'text', array('label' => 'Nom: '))
            ->add('cognom', 'text', array('label' => 'Cognoms: '))
            ->add('adreca', 'textarea', array('label' => 'Adreça: '))
            ->add('poblacio', 'text', array('label' => 'Població: '))
            ->add('codi_postal', 'text', array('label' => 'Codi Postal: '))
            ->add('email', 'email', array('label' => 'Correu Electrònic: '))
            ->add('telefon', 'text', array('label' => 'Telèfon: '))
            ->add('password', 'repeated', array(
                'type' => 'password',
                'invalid_message' => 'Les dos contrasenyes han de ser la mateixa.',
                'options' => array(
                    'attr' => array('class' => 'password-field')),
                'first_options'  => array('label' => 'Contrasenya: '),
                'second_options' => array('label' => 'Repeteix Contrasenya: ')))
            ->add('fotografia', 'file', array('label' => 'Fotografia: '));*/
            //->add('salt')
            ->add('email')
            ->add('password')
            ->add('isActive')
            ->add('nom')
            ->add('cognom')
            ->add('adreca')
            ->add('poblacio')
            ->add('codi_postal')
            ->add('telefon')
            ->add('fotografia')
            ->add('password')
            ->add('presentacio')
            ->add('punts')
            ->add('rol')
            ;
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
        //return 'bonavall_bancdeltemps_altausuari';
        return 'bonavall_bancdeltempsbundle_altausuari';
        // TODO: Implement getName() method.
    }
}
