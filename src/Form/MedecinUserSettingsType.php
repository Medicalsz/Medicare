<?php

namespace App\Form;

use App\Entity\Medecin;
use App\Enum\MedicalSpecialty;
use App\Enum\TunisianCity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class MedecinUserSettingsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $privacyChoices = [
            'Public (Visible to everyone)' => 'public',
            'Private (Only me)'            => 'private',
            'Doctors only'                 => 'doctors',
        ];

        $builder
            ->add('username', TextType::class, [
                'label' => 'Username',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Enter your username'],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Username is required']),
                    new Assert\Length(['min' => 3, 'max' => 100])
                ]
            ])
            ->add('prenom', TextType::class, [
                'label' => 'First Name',
                'attr' => ['class' => 'form-control'],
                'constraints' => [new Assert\NotBlank()]
            ])
            ->add('nom', TextType::class, [
                'label' => 'Last Name',
                'attr' => ['class' => 'form-control'],
                'constraints' => [new Assert\NotBlank()]
            ])
            ->add('numero', TelType::class, [
                'label' => 'Phone Number',
                'attr' => ['class' => 'form-control'],
                'required' => false
            ])
            ->add('email', TextType::class, [
                'label' => 'Email Address',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Enter your email address'],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Email is required']),
                    new Assert\Email(['message' => 'Please enter a valid email address']),
                ],
            ])
            ->add('specialite', ChoiceType::class, [
                'label' => 'Specialty',
                'choices' => MedicalSpecialty::toArray(),
                'attr' => ['class' => 'form-select']
            ])
            ->add('ville', ChoiceType::class, [
                'label' => 'City',
                'choices' => TunisianCity::toArray(),
                'attr' => ['class' => 'form-select']
            ])
            ->add('cabinet', TextType::class, [
                'label' => 'Cabinet Name',
                'attr' => ['class' => 'form-control']
            ])
            ->add('adresse', TextareaType::class, [
                'label' => 'Address',
                'attr' => ['class' => 'form-control', 'rows' => 2]
            ])
            ->add('prixConsultation', NumberType::class, [
                'label' => 'Consultation Fee (DT)',
                'attr' => ['class' => 'form-control', 'step' => '0.001']
            ])
            ->add('bio', TextareaType::class, [
                'label' => 'Bio',
                'attr' => ['class' => 'form-control', 'rows' => 4],
                'required' => false
            ])
            ->add('emailPrivacy', ChoiceType::class, [
                'label' => 'Email Visibility',
                'choices' => $privacyChoices,
                'attr' => ['class' => 'form-select']
            ])
            ->add('phonePrivacy', ChoiceType::class, [
                'label' => 'Phone Visibility',
                'choices' => $privacyChoices,
                'attr' => ['class' => 'form-select']
            ])
            ->add('addressPrivacy', ChoiceType::class, [
                'label' => 'Address Visibility',
                'choices' => $privacyChoices,
                'attr' => ['class' => 'form-select']
            ])
            ->add('photo', FileType::class, [
                'label' => 'Profile Photo',
                'mapped' => false,
                'required' => false,
                'attr' => ['class' => 'form-control'],
                'constraints' => [
                    new Assert\File([
                        'maxSize' => '2M',
                        'mimeTypes' => ['image/jpeg', 'image/png', 'image/webp'],
                    ])
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => Medecin::class]);
    }
}
