<?php

namespace App\Form;

use App\Entity\Cv;
use Symfony\Component\Form\AbstractType;
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
            ->add('experienceYear')
            ->add('headerSkills')
            ->add('fileName')
            ->add('trainning', CollectionType::class, [
                'entry_type' => TrainningType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'by_reference' => false,
                'allow_delete' => true,
                'attr' => [
                    'class' => 'col-4'
                ],
                'label' => false
            ])
            ->add('certification', CollectionType::class, [
                'entry_type' => CertificationType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'by_reference' => false,
                'allow_delete' => true,
                'attr' => [
                    'class' => 'col-4'
                ],
                'label' => false
            ])
            ->add('skills', CollectionType::class, [
                'entry_type' => SkillsType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'by_reference' => false,
                'allow_delete' => true,
                'attr' => [
                    'class' => 'col-4'
                ],
                'label' => false
            ])
            ->add('experience', CollectionType::class, [
                'entry_type' => ExperienceType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'by_reference' => false,
                'allow_delete' => true,
                'attr' => [
                    'class' => 'col-4'
                ],
                'label' => false
            ])
            ->add('footer', null, [
                'label' => 'Missions',
                'attr' => [
                    'rows' => 4
                ]
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
