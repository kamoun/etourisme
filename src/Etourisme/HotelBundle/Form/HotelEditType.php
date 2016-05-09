<?php

namespace Etourisme\HotelBundle\Form;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class HotelEditType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomHotel', TextType::class,array('label' => 'Nom d`hôtel (*)'))
            ->add('ville',EntityType::class, array('label' => 'Ville (*)', 'class' => 'HotelBundle:Ville', 'expanded' => false, 'required'=> true,
            'placeholder' => 'Choisir la ville...',))
            ->add('descrip',CKEditorType::class)
            ->add('details',CKEditorType::class)
            ->add('categorie',EntityType::class, array('label' => 'Catégorie (*)', 'class' => 'HotelBundle:Categorie', 'expanded' => false, 'required'=> true,
            'placeholder' => 'Choisir la catégorie...',))
            ->add('promotion')
            ->add('age_min',IntegerType::class,array('attr'=>array('min'=>"1" ,'max'=>"20"), 'required'=> false))
            ->add('age_max',  IntegerType::class,array('attr'=>array('min'=>"1" ,'max'=>"20"), 'required'=> false))
            ->add('imagess', CollectionType::class, array(
                  'entry_type' =>  ImageType::class,
                  'allow_add' => true,
                  'allow_delete' => true,
                  'by_reference' => false,
                  'required' => false,
                  'mapped'=>false
            ))
            ->add('latitude')
            ->add('longtitude')
    

        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Etourisme\HotelBundle\Entity\Hotel'
        ));
    }
}
