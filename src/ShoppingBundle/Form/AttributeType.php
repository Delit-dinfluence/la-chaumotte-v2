<?php

namespace Shopping\Form;

use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use Shopping\Entity\Attribute;
use Shopping\Entity\AttributeGroup;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class AttributeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('imageFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => true,
            ])
            ->add('is_enabled')
            ->add('translations', TranslationsType::class)
            ->add('attribute_group', EntityType::class,[
                'class' => AttributeGroup::class
            ])
            ->add('submit', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Attribute::class
        ]);
    }
}
