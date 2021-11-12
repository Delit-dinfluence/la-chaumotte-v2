<?php

namespace Shopping\Form;

use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use Shopping\Entity\Attribute;
use Shopping\Entity\AttributeGroup;
use Shopping\Entity\PaymentCreditAgricole;
use Shopping\Entity\PaymentPaypal;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaymentCreditAgricoleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('is_enabled')

            ->add('paybox_site')
            ->add('paybox_rang')
            ->add('paybox_id')
            ->add('paybox_url_success')
            ->add('paybox_url_reply_to')
            ->add('paybox_url_cancel')
            ->add('paybox_url_fail')
            ->add('paybox_settings_cancel')
            ->add('paybox_key_hmac')


            ->add('submit', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PaymentCreditAgricole::class
        ]);
    }
}
