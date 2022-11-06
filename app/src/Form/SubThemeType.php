<?php

namespace App\Form;

use App\Entity\SubTheme;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SubThemeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('year')
            ->add('qualification')
            ->add('skillsTitle', null, [
                'attr' => [
                    'class' => 'form-control select2-cv-data',
                    'data-field'=>'websiteSociety'
                ]
            ])
            ->add('skillsDescription', TextareaType::class,['attr'=>['class'=>'form-control']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SubTheme::class,
        ]);
    }
}
