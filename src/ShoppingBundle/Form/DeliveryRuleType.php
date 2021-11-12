<?php

namespace Shopping\Form;

use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class DeliveryRuleType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('is_enabled')
            ->add('limit_upper')
            ->add('limit_lower')
            ->add('limit_lower_or_equal')
            ->add('limit_upper_or_equal')
            ->add('charge_price')
            ->add('free_charge_price')

            ->add('charge_type', ChoiceType::class, [
                'choices'  => [
                    'Prix TTC' => '0',
                    'Poids' => '1',
                    'Quantité' => '2'
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
