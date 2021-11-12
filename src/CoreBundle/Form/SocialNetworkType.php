<?php

namespace Core\Form;

use Core\Entity\HistoryConfiguration;
use Core\Entity\HistoryGravityType;
use Core\Entity\SocialNetwork;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class SocialNetworkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('is_enabled')
            ->add('designation')
            ->add('link')
            ->add('logoFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => true,
                'download_uri' => false,
            ])
            ->add('submit', SubmitType::class);;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SocialNetwork::class
        ]);
    }
}
