<?php

namespace Shopping\Form;

use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use Shopping\Entity\DeliveryRule;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class DeliveryHomeType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('is_enabled')

            ->add('rules', EntityType::class, [
                'class' => DeliveryRule::class,
                'multiple' => true
            ])
            ->add('out_of_range_behavior', ChoiceType::class, [
                'choices'  => [
                    'Appliquer le prix le plus haut' => '0',
                    'Appliquer le prix le plus bas' => '1',
                    'Désactiver le moyen de livraison' => '2'
                ],
            ])

            ->add('submit', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
