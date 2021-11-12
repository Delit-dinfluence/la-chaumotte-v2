<?php

namespace Core\Form;

use Core\Entity\Design;
use Core\Entity\DesignFontFamilyType;
use Core\Entity\DesignFontSize;
use Core\Entity\DesignThemeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class DesignType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $families = [];
        foreach(DesignFontFamilyType::getTypeNames() as $key => $value ){
            $families[$value] = $key;
        }

        $types = [];
        foreach(DesignThemeType::getTypeNames() as $key => $value ){
            $types[$value] = $key;
        }

        $sizes= [];
        foreach(DesignFontSize::getTypeNames() as $key => $value ){
            $sizes[$value] = $key;
        }

        $builder
            ->add('theme', ChoiceType::class, [
                'choices' => $types
            ])
            ->add('font_family', ChoiceType::class, [
                'choices' => $families
            ])
            ->add('font_size', ChoiceType::class, [
                'choices' => $sizes
            ])
            ->add('name')
            ->add('logoFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => true,
            ])
            ->add('color_first')
            ->add('color_second')
            ->add('text_color')
            ->add('background')
            ->add('sidebar_background')
            ->add('sidebar_color')
            ->add('sidebar_width')

            ->add('submit', SubmitType::class);;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Design::class
        ]);
    }
}
