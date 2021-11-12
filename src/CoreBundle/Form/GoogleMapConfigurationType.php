<?php

namespace Core\Form;

use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use Core\Entity\AppConfiguration;
use Core\Entity\ComingSoonConfiguration;
use Core\Entity\Configuration;
use Core\Entity\CookieConfiguration;
use Core\Entity\GoogleMapConfiguration;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class GoogleMapConfigurationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('api_key')
            ->add('zoom')
            ->add('latitude')
            ->add('longitude')

            ->add('submit', SubmitType::class);;
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => GoogleMapConfiguration::class
        ]);
    }
}
