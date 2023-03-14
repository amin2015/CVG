<?php

namespace App\Form;

use App\Entity\Trainning;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrainningType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('year', null, [
                'label' => 'Année',
                'attr' => [
                    'class' => 'col-sm-3 mb-3'
                ],
            ])
            ->add('qualification', null, [
                'label' => 'Diplôme',
                'attr' => [
                    'class' => 'col-sm-3 mb-3'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Trainning::class,
        ]);
    }
}
