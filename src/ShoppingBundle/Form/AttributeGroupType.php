<?php

namespace Shopping\Form;

use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use Shopping\Entity\AttributeGroup;
use Shopping\Entity\AttributePrintType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class AttributeGroupType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $attributes = [];
        foreach(AttributePrintType::getTypeNames() as $key => $value ){
            $attributes[$value] = $key;
        }

        $builder
            ->add('is_enabled')
            ->add('formats')
            ->add('group_required')
            ->add('print_type', ChoiceType::class, [
                'choices' => $attributes
            ])
            ->add('imageFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => true,
            ])
            ->add('translations', TranslationsType::class)
            ->add('submit', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AttributeGroup::class
        ]);
    }
}
