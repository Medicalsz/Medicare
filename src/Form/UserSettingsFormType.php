<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints as Assert;

class UserSettingsFormType extends AbstractType
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
            ->add("prenom", TextType::class, ["label" => "First Name", "attr" => ["class" => "form-control", "placeholder" => "Enter your first name"], "constraints" => [new Assert\NotBlank(["message" => "First name is required"]), new Assert\Length(["min" => 2, "max" => 100])]])
            ->add("nom", TextType::class, ["label" => "Last Name", "attr" => ["class" => "form-control", "placeholder" => "Enter your last name"], "constraints" => [new Assert\NotBlank(["message" => "Last name is required"]), new Assert\Length(["min" => 2, "max" => 100])]])
            ->add("numero", TelType::class, ["label" => "Phone Number", "attr" => ["class" => "form-control", "placeholder" => "Enter your phone number"], "required" => false, "constraints" => [new Assert\Length(["min" => 8, "max" => 20])]])
            ->add('email', TextType::class, [
                'label' => 'Email Address',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Enter your email address'],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Email is required']),
                    new Assert\Email(['message' => 'Please enter a valid email address']),
                ],
            ])
            ->add("adresse", TextType::class, ["label" => "Address", "attr" => ["class" => "form-control", "placeholder" => "Enter your address"], "required" => false, "constraints" => [new Assert\Length(["max" => 255])]])
            ->add('emailPrivacy', ChoiceType::class, [
                'label'   => 'Email Visibility',
                'choices' => $privacyChoices,
                'attr'    => ['class' => 'form-select'],
            ])
            ->add('phonePrivacy', ChoiceType::class, [
                'label'   => 'Phone Visibility',
                'choices' => $privacyChoices,
                'attr'    => ['class' => 'form-select'],
            ])
            ->add('addressPrivacy', ChoiceType::class, [
                'label'   => 'Address Visibility',
                'choices' => $privacyChoices,
                'attr'    => ['class' => 'form-select'],
            ])
            ->add('photo', FileType::class, [
                'label' => 'Photo de profil',
                'mapped' => false,
                'required' => false,
                'attr' => ['class' => 'form-control'],
                'constraints' => [
                    new Assert\File([
                        'maxSize' => '2M',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/webp',
                        ],
                        'mimeTypesMessage' => 'Veuillez uploader une image valide (JPG, PNG ou WebP).',
                    ])
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(["data_class" => User::class]);
    }
}
