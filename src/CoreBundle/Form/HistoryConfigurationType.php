<?php

namespace Core\Form;

use Core\Entity\HistoryConfiguration;
use Core\Entity\HistoryGravityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HistoryConfigurationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $types = [];
        foreach(HistoryGravityType::getTypeNames() as $key => $value ){
            $types[$value] = $key;
        }

        $builder
            ->add('use_form_new')
            ->add('use_form_edit')
            ->add('use_form_duplicate')
            ->add('use_form_statut')
            ->add('use_form_remove')
            ->add('use_login')
            ->add('email_level', ChoiceType::class, [
                'choices' => $types
            ])
            ->add('submit', SubmitType::class);;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => HistoryConfiguration::class
        ]);
    }
}
