<?php

namespace bonavall\BancdeltempsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SolicitutsType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dataSolicitut')
            ->add('solicitant')
            //->add('ofertant')
            ->add('serveiSolicitat')
            ->add('estatSolicitut')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'bonavall\BancdeltempsBundle\Entity\Solicituts'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bonavall_bancdeltempsbundle_solicituts';
    }
}
