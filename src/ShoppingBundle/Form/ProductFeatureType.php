<?php

namespace Shopping\Form;

use Shopping\Entity\Feature;
use Shopping\Entity\FeatureGroup;
use Shopping\Entity\ProductFeature;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductFeatureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('feature_group', EntityType::class, [
                'class' => FeatureGroup::class,
            ])
            ->add('feature', EntityType::class, [
                'class' => Feature::class,
                'required' => false,
                'placeholder' => 'Choisir un attribut'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ProductFeature::class
        ]);
    }
}
