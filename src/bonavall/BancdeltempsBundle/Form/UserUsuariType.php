<?php

namespace bonavall\BancdeltempsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserUsuariType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder
            ->add('salt')
            ->add('email')
            ->add('password')
            ->add('isActive')
            ->add('nom')
            ->add('cognom')
            ->add('adreca','entity', array('class' => 'bonavallBancdeltempsBundle:Poblacion', 'query_builder' => function($er) {
                        return $er->createQueryBuilder('u')
                                ->orderBy('u.poblacio', 'ASC');
                    }))
            ->add('telefon')
            ->add('fotografia')
            ->add('presentacio')
            ->add('punts')
            ->add('rol')
           
        ;
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
     * @return string
     */
    public function getName()
    {
        return 'bonavall_bancdeltempsbundle_usuari';
    }
}