<?php

namespace App\Form;

use App\Entity\TechnicalSkills;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SkillsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('skills', null, [
                'label' => 'Compétences',
                'attr' => [
                    'class' => 'col-sm-3 mb-3'
                ],
            ])
            ->add('techniques', null, [
                'label' => 'Techniques',
                'attr' => [
                    'class' => 'col-sm-3 mb-3'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TechnicalSkills::class,
        ]);
    }
}
