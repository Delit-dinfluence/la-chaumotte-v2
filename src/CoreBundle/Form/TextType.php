<?php

namespace Core\Form;

use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use Core\Entity\Text;
use Core\Entity\TextPrintType;
use Proxies\__CG__\Core\Entity\TextGroup;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TextType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $types = [];
        foreach(TextPrintType::getTypeNames() as $key => $value ){
            $types[$value] = $key;
        }

        $builder
            ->add('is_enabled')
            ->add('reference')
            ->add('type', ChoiceType::class, [
                'choices' => $types
            ])
            ->add('text_group', EntityType::class, [
                'class' => TextGroup::class
            ])
            ->add('translations', TranslationsType::class)
            ->add('submit', SubmitType::class);;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Text::class
        ]);
    }
}
