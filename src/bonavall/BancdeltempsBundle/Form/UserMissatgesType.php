<?php

namespace bonavall\BancdeltempsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserMissatgesType extends AbstractType
{
     private static $count = 0;
     private $suffix;
    
     public function __construct() {
        $this->suffix = self::$count++;
     }
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('missatge')
            //->add('data','datetime')
            //->add('autor')
            
            //->add('solicituts')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'bonavall\BancdeltempsBundle\Entity\Missatges'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bonavall_bancdeltempsbundle_missatges'.$this->suffix;
    }
}
