<?php

namespace Core\Form;

use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use Core\Entity\Redirection;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class RedirectionType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $types = [];
        foreach (\Core\Entity\RedirectionType::getTypeNames() as $key => $value) {
            $types[$value] = $key;
        }


        $builder
            ->add('is_enabled')
            ->add('type', ChoiceType::class, [
                'choices' => $types
            ])
            ->add('uri_from')
            ->add('uri_to')
            ->add('submit', SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Redirection::class
        ]);
    }
}
