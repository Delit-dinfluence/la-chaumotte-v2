<?php

namespace Shopping\Form;

use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use Shopping\Entity\BoughtRedirectType;
use Shopping\Entity\Product;
use Shopping\Entity\RandomPrintType;
use Shopping\Entity\ShopConfiguration;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ShopConfigurationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $redirects = [];
        foreach (BoughtRedirectType::getTypeNames() as $key => $value) {
            $redirects[$value] = $key;
        }
        $types = [];
        foreach (RandomPrintType::getTypeNames() as $key => $value) {
            $types[$value] = $key;
        }

        $builder

            ->add('free_delivery_count')
            ->add('bought_redirect_type', ChoiceType::class, [
                'choices' => $redirects
            ])
            ->add('random_type', ChoiceType::class, [
                'choices' => $types
            ])
            ->add('random_count')
//            ->add('translations', TranslationsType::class)
            ->add('submit', SubmitType::class);;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ShopConfiguration::class
        ]);
    }
}
