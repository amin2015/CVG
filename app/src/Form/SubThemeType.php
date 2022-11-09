<?php

namespace App\Form;

use App\Entity\SubTheme;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class SubThemeType extends AbstractType
{
    private UrlGeneratorInterface $route;

    public function __construct(UrlGeneratorInterface $route)
    {
        $this->route = $route;
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('year')
            ->add('qualification')
            ->add('skillsTitle', null, [
                'attr' => ['class' => 'select2-cv-data', 'data-field'=> $this->route->generate('ajax_subtheme_choice',['field'=>'name'] )],

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
