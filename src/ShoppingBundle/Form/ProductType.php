<?php

namespace Shopping\Form;

use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use Core\Form\ImageType;
use Shopping\Entity\Product;
use Shopping\Entity\Tax;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $redirects = [];
        foreach (\Shopping\Entity\ProductRedirect::getTypeNames() as $key => $value) {
            $redirects[$value] = $key;
        }

        $types = [];
        foreach (\Shopping\Entity\ProductType::getTypeNames() as $key => $value) {
            $types[$value] = $key;
        }


        $builder
            ->add('is_enabled')
            ->add('reference')
            ->add('is_indexable')
            ->add('priority')
            ->add('price_ht')
            ->add('tax', EntityType::class, [
                'class' => Tax::class,
                'choice_attr' => function($entity, $key, $index) {
                    return ['data-rate' => $entity->getRate()];
        },
            ])
            ->add('redirect', ChoiceType::class, [
                'choices' => $redirects
            ])
            ->add('redirect_link')
            ->add('type', ChoiceType::class, [
                'choices' => $types
            ])
            ->add('categories')
            ->add('related_products')
            ->add('sortorder')


            ->add('product_features', CollectionType::class, array(
                'entry_type' => ProductFeatureType::class,
                'by_reference' => false,
                'prototype' => true,
                'allow_add' => true,
                'allow_delete' => true,
            ))

            ->add('medalFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => true,
            ])

            ->add('translations', TranslationsType::class)
            ->add('submit', SubmitType::class);;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class
        ]);
    }
}
