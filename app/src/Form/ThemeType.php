<?php

namespace App\Form;

use App\Entity\Theme;
use App\Entity\SubTheme;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ThemeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [
                'label' => 'Nom du thème',
                'attr' => [
                    'class' => 'col-sm-3 mb-3'
                ],
            ])
            ->add('type',  ChoiceType::class, [
                'choices' => [
                    'Education' => 1,
                    'Skills' => 2,
                ],
                'attr' => [
                    'class' => 'col-sm-3 mb-3'
                ],
            ])
            ->add('subTheme', CollectionType::class, [
                'entry_type' => SubThemeType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'attr' => [
                    'class' => 'col-sm-3 mb-3'
                ],
                'label' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Theme::class,
        ]);
    }
}
