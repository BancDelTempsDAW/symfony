<?php

namespace bonavall\BancdeltempsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserServeisType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('punts')
                ->add('nomServei')
                ->add('descripcioServei')
                ->add('poblacio', 'entity', array('class' => 'bonavallBancdeltempsBundle:Poblacion', 'query_builder' => function($er) {
                        return $er->createQueryBuilder('u')
                                ->orderBy('u.poblacio', 'ASC');
                    }))
                ->add('dataInici')
                ->add('durada')
                ->add('dataFinal')
                ->add('iddonant')
                ->add('tipusServei1')
        //->add('estatServei')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'bonavall\BancdeltempsBundle\Entity\Serveis'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'bonavall_bancdeltempsbundle_serveis';
    }

}
