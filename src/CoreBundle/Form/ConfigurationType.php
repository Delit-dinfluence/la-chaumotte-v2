<?php

namespace Core\Form;

use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use Core\Entity\AppConfiguration;
use Core\Entity\ComingSoonConfiguration;
use Core\Entity\Configuration;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ConfigurationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sitename')
            ->add('domain')
            ->add('logoFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => true,
            ])

            ->add('submit', SubmitType::class);;
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Configuration::class
        ]);
    }
}
