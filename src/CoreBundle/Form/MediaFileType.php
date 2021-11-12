<?php

namespace Core\Form;

use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use Core\Entity\Configuration;
use Core\Entity\Image;
use Core\Entity\MediaFile;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class MediaFileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reference')
            ->add('documentFile', VichFileType::class, [
                'required' => false,
                'allow_delete' => true,
            ])
            ->add('translations', TranslationsType::class)
            ->add('submit', SubmitType::class);;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MediaFile::class
        ]);
    }
}
