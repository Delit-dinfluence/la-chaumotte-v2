<?php

namespace Shopping\Form;

use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use Shopping\Entity\Attribute;
use Shopping\Entity\AttributeGroup;
use Shopping\Entity\PaymentPaypal;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaymentPaypalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('is_enabled')

            ->add('buisness_id')
            ->add('buisness_token')
            ->add('webhook_id')

            ->add('debug_buisness_id')
            ->add('debug_buisness_token')
            ->add('debug_webhook_id')


            ->add('currency', ChoiceType::class, [
                'choices' => [
                    'Euro' => 'EUR'
                ]
            ])
            ->add('description')
            ->add('url_cancel')
            ->add('url_notify')


            ->add('submit', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PaymentPaypal::class
        ]);
    }
}
