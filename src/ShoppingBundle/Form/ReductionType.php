<?php

namespace Shopping\Form;

use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use Shopping\Entity\Reduction;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReductionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $types = [];
        foreach (\Shopping\Entity\ReductionType::getTypeNames() as $key => $value) {
            $types[$value] = $key;
        }

        $builder
            ->add('is_enabled')
            ->add('type', ChoiceType::class, [
                'choices' => $types
            ])
            ->add('value')
            ->add('use_timer')
            ->add('available_from')
            ->add('available_to')
            ->add('starting_at')

            ->add('groups')
            ->add('customers')

            ->add('translations', TranslationsType::class)
            ->add('submit', SubmitType::class);;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reduction::class
        ]);
    }
}
