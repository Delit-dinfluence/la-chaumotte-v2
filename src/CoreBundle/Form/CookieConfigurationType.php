<?php

namespace Core\Form;

use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use Core\Entity\AppConfiguration;
use Core\Entity\ComingSoonConfiguration;
use Core\Entity\Configuration;
use Core\Entity\CookieConfiguration;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class CookieConfigurationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('google_analytics')
            ->add('add_this')
            ->add('pixel_facebook')
            ->add('recaptcha_client')
            ->add('recaptcha_server')
            ->add('recaptcha_hostname')

            ->add('submit', SubmitType::class);;
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CookieConfiguration::class
        ]);
    }
}
