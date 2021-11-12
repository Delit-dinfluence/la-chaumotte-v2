<?php

namespace Shopping\Form;

use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use Shopping\Entity\AttributeGroup;
use Shopping\Entity\AttributePrintType;
use Shopping\Entity\Order;
use Shopping\Entity\OrderStatus;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $status = [];
        foreach(OrderStatus::getTypeNames() as $key => $value ){
            $status[$value] = $key;
        }

        $builder
            ->add('reference')
            ->add('debug')
            ->add('payment_method', EntityType::class, [
                'class' => 'Shopping\Entity\PaymentMethod'
            ])
            ->add('delivery_method', EntityType::class, [
                'class' => 'Shopping\Entity\DeliveryMethod'
            ])
            ->add('delivery_price')
            ->add('status', ChoiceType::class, [
                'choices' => $status
            ])
            ->add('submit', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Order::class
        ]);
    }
}
