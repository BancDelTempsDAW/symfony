<?php

namespace bonavall\BancdeltempsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserSolicitutsType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('dataSolicitut', 'datetime', array('disabled' => true))
                ->add('solicitant', 'entity', array('class' => 'bonavallBancdeltempsBundle:Usuari', 'read_only' => true))
                ->add('serveiSolicitat', 'entity', array('class' => 'bonavallBancdeltempsBundle:Serveis', 'read_only' => true))
                ->add('estatSolicitut', 'entity', array('class' => 'bonavallBancdeltempsBundle:EstatServei', 'disabled' => true))
                
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'bonavall\BancdeltempsBundle\Entity\Solicituts'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'bonavall_bancdeltempsbundle_solicituts';
    }

}
