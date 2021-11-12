<?php

namespace Shopping\Form;

use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use Core\Entity\Image;
use Shopping\Entity\Feature;
use Shopping\Entity\FeatureGroup;
use Shopping\Entity\ProductFeature;
use Shopping\Entity\ProductFile;
use Shopping\Entity\ProductImage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProductFileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('documentFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => true,
            ])
            ->add('translations', TranslationsType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ProductFile::class
        ]);
    }
}
