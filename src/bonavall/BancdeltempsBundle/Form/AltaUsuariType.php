<?php

namespace bonavall\BancdeltempsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
/*use Symfony\Component\OptionsResolver\OptionsResolverInterface;*/

//class AltaUsuariType extends AbstractType
class AltaUsuariType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom', 'text', array())
                ->add('cognoms')
                ->add('direccio')
                ->add('codi_postal')
                ->add('poblacio')
                ->add('dni', 'text', array('label' => 'DNI'))
                ->add('Email', 'email')



                // Arreglar correo para que funciones el formulario
                /*->add('correu', array(
                    'type' => 'email',
                    'options' => array('label' => 'Correu Electrònic: '),
                    'required' => true
                ))*/

                ->add('password', 'repeated', array(
                    'type' => 'password',
                    'invalid_message' => 'Les dos contrasenyes han de ser la mateixa.',
                    'options' => array(
                        'attr' => array('class' => 'password-field')),
                    'required' => true,
                    'first_options'  => array('label' => 'Contrasenya: '),
                    'second_options' => array('label' => 'Repeteix Contrasenya: '),
                ));

    }

    public function getDefaultOptions(array $options) //array $options
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
        // TODO: Implement getName() method.
    }
}
