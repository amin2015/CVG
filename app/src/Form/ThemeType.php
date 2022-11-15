<?php

namespace App\Form;

use App\Entity\Theme;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class ThemeType extends AbstractType
{
    private UrlGeneratorInterface $route;
    public function __construct(UrlGeneratorInterface $route)
    {
        $this->route = $route;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [
                'label' => 'Nom du thème',
//                'attr' => ['class' => 'select2-cv-data', 'data-field'=> $this->route->generate('ajax_theme_choice',['field'=>'name'] )],
            ])
            ->add('type', ChoiceType::class, [
                'choices'  => [
                    Theme::EXPERIENCE_LABEL => Theme::EXPERIENCE_ID,
                    Theme::COMPETENCE_LABEL => Theme::COMPETENCE_ID,
                    Theme::FORMATION_LABEL => Theme::FORMATION_ID,
                ],
            ])
            ->add('subTheme', CollectionType::class, [
                'entry_type' => SubThemeType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'by_reference' => false,
            ])

        ;
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Theme::class,
        ]);
    }
}
