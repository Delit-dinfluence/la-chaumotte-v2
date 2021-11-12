<?php

namespace Shopping\Form;

use Shopping\Entity\Feature;
use Shopping\Entity\FeatureGroup;
use Shopping\Entity\ProductFeature;
use Shopping\Entity\ResearchConfiguration;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResearchConfigurationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('use_cache')
          ->add('use_suggest')
          ->add('by_reference')
          ->add('by_url')
          ->add('by_designation')
          ->add('by_keywords')
          ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ResearchConfiguration::class
        ]);
    }
}
