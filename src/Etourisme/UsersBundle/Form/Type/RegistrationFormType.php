<?php

namespace Etourisme\UsersBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class RegistrationFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                
           
             ->add('roles',ChoiceType::class,array('choices'=>array('ADMIN'=>'ADMIN','SIMPLEUSER'=>'Simple utilisateur'),'mapped' => false,'multiple'=>false,'expanded'=>true, 'placeholder' => 'Choose an option'))
            
            ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ControleBundle\Entity\Utilisateur'
        ));
    }
    
     public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }


    /**
     * @return string
     */
    public function getName()
    {
        return 'sarracard_controlebundle_sarracarduser';
    }
}
