<?php

namespace Etourisme\HotelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
 use Symfony\Component\Form\Extension\Core\Type\TextType;
 use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class HotelType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomHotel', TextType::class,array('label' => 'Nom d`hôtel'))
            ->add('ville')
            ->add('descrip')
            ->add('details')
            ->add('img1')
            ->add('img2')
            ->add('img3')
            ->add('img4')
            ->add('categorie',EntityType::class, array('class' => 'HotelBundle:Categorie', 'expanded' => false, 'required'    => true,
    'placeholder' => 'Choisir la catégorie',))
            ->add('promotion')
            ->add('dispo')
            ->add('age_min')
            ->add('age_max')
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
