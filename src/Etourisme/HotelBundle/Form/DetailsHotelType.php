<?php

namespace Etourisme\HotelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class DetailsHotelType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tempsd',  DateType::class, array(
                    'label' => 'Date du',                   
                    'widget' => 'single_text',
                ))
            ->add('tempsf',  DateType::class, array(
                    'label' => 'au',
                    'widget' => 'single_text',      
                ))
            ->add('tarifBase',IntegerType::class,array('label' => 'Tarif de base','attr'=>array('min'=>"0" )))
            ->add('delaiRetro',TextType::class,array('label' => 'Délai de Rétrocession'))
            ->add('allot',IntegerType::class,array('label' => 'Allotement','attr'=>array('min'=>"0")))
            ->add('nbChambs',IntegerType::class,array('attr'=>array('min'=>"0")))
            ->add('nbChambd',IntegerType::class,array('attr'=>array('min'=>"0")))
            ->add('nbChambt',IntegerType::class,array('attr'=>array('min'=>"0")))
            ->add('nbChambq',IntegerType::class,array('attr'=>array('min'=>"0")))
            ->add('reduc1',IntegerType::class,array('attr'=>array('min'=>"0")))
            ->add('reduc2',IntegerType::class,array('attr'=>array('min'=>"0")))
            ->add('reduc3',IntegerType::class,array('attr'=>array('min'=>"0")))
            ->add('reduc4',IntegerType::class,array('attr'=>array('min'=>"0")))
            ->add('reduc5',IntegerType::class,array('attr'=>array('min'=>"0")))
            ->add('suppSingle',IntegerType::class,array('label' => 'Supplément Single','attr'=>array('min'=>"0")))
           
            ->add('suppTarif',IntegerType::class,array('attr'=>array('min'=>"0")))
            ->add('suppLpd',IntegerType::class,array('attr'=>array('min'=>"0")))
            ->add('suppDp',IntegerType::class,array('attr'=>array('min'=>"0")))
            ->add('suppPc',IntegerType::class,array('attr'=>array('min'=>"0")))
            ->add('suppAll',IntegerType::class,array('attr'=>array('min'=>"0")))
            ->add('suppLs',IntegerType::class,array('attr'=>array('min'=>"0")))
            ->add('suppAllSoft',IntegerType::class,array('attr'=>array('min'=>"0")))
            ->add('suppUltraAll',IntegerType::class,array('attr'=>array('min'=>"0")))
            ->add('suppDpp',IntegerType::class,array('attr'=>array('min'=>"0")))
            ->add('suppPcp',IntegerType::class,array('attr'=>array('min'=>"0")))
            ->add('marge',IntegerType::class,array('label' => 'Marge','attr'=>array('min'=>"0")))
            ->add('hotel')
          
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Etourisme\HotelBundle\Entity\DetailsHotel',
             'csrf_protection' => false,
        ));
    }
}
