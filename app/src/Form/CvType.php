<?php

namespace App\Form;

use App\Entity\Cv;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class CvType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('headerTitle')
            ->add('headerSkills')
            ->add('fileName')
            ->add('logo', FileType::class)
            ->add('color', ColorType::class)
            ->add('nameSociety', null, [
                'attr' => [
                    'class' => 'select2-cv-data',
                    'data-field'=>'nameSociety'
                ]
            ])
            ->add('commercialInformation', null, [
                'attr' => [
                    'class' => 'form-control select2-cv-data',
                    'data-field'=>'commercialInformation'
                ]
            ])
            ->add('websiteSociety', null, [
                'attr' => [
                    'class' => 'form-control select2-cv-data',
                    'data-field'=>'websiteSociety'
                ]
            ])
            ->add('theme', CollectionType::class, [
                'entry_type' => ThemeType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'by_reference' => false,
                'allow_delete' => true,
                'attr' => [
                    'class' => 'col-sm-3 mb-3'
                ],
                'label' => false
            ])
            ->add('export', SubmitType::class)
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cv::class,
        ]);
    }
}
