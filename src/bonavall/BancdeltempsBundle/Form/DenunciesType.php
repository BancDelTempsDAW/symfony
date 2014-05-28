<?php

namespace bonavall\BancdeltempsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DenunciesType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('motiu')
            ->add('resolucio')
            ->add('dataDenuncia')
            ->add('denunciant')
            ->add('denunciat')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'bonavall\BancdeltempsBundle\Entity\Denuncies'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bonavall_bancdeltempsbundle_denuncies';
    }
}
