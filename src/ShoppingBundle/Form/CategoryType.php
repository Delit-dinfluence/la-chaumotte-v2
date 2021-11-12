<?php

namespace Shopping\Form;

use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class CategoryType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('is_enabled')
            ->add('reference')
            ->add('is_indexable')
            ->add('priority')
            ->add('imageFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => true,
            ])

            ->add('parent')
            ->add('translations', TranslationsType::class, [
                'fields' => [
                    'description' => [
                        'label' => 'Description',
                        'attr' => [
                            'class' => 'wysiwyg'
                        ]
                    ]
                ]
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
