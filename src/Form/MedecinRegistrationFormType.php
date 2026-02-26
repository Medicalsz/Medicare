<?php

namespace App\Form;

use App\Entity\Medecin;
use App\Enum\MedicalSpecialty;
use App\Enum\TunisianCity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Positive;

class MedecinRegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'attr' => ['placeholder' => 'Votre nom'],
                'constraints' => [
                    new NotBlank(['message' => 'Le nom est obligatoire']),
                    new Length([
                        'min' => 2,
                        'max' => 100,
                        'minMessage' => 'Le nom doit contenir au moins {{ limit }} caractères',
                        'maxMessage' => 'Le nom ne peut pas dépasser {{ limit }} caractères',
                    ]),
                ],
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
                'attr' => ['placeholder' => 'Votre prénom'],
                'constraints' => [
                    new NotBlank(['message' => 'Le prénom est obligatoire']),
                    new Length([
                        'min' => 2,
                        'max' => 100,
                        'minMessage' => 'Le prénom doit contenir au moins {{ limit }} caractères',
                        'maxMessage' => 'Le prénom ne peut pas dépasser {{ limit }} caractères',
                    ]),
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email professionnel',
                'attr' => ['placeholder' => 'votre@email.com'],
                'constraints' => [
                    new NotBlank(['message' => 'L\'email est obligatoire']),
                ],
            ])
            ->add('numero', TextType::class, [
                'label' => 'Numéro de téléphone',
                'attr' => ['placeholder' => '+216 XX XXX XXX'],
                'constraints' => [
                    new NotBlank(['message' => 'Le numéro est obligatoire']),
                ],
            ])
            ->add('specialite', ChoiceType::class, [
                'label' => 'Spécialité',
                'choices' => MedicalSpecialty::toArray(),
                'placeholder' => 'Sélectionnez votre spécialité',
                'constraints' => [
                    new NotBlank(['message' => 'La spécialité est obligatoire']),
                ],
            ])
            ->add('ville', ChoiceType::class, [
                'label' => 'Ville',
                'choices' => TunisianCity::toArray(),
                'placeholder' => 'Sélectionnez votre ville',
                'constraints' => [
                    new NotBlank(['message' => 'La ville est obligatoire']),
                ],
            ])
            ->add('cabinet', TextType::class, [
                'label' => 'Nom du cabinet',
                'attr' => ['placeholder' => 'Nom de votre cabinet ou clinique'],
                'constraints' => [
                    new NotBlank(['message' => 'Le nom du cabinet est obligatoire']),
                    new Length([
                        'max' => 255,
                        'maxMessage' => 'Le nom du cabinet ne peut pas dépasser {{ limit }} caractères',
                    ]),
                ],
            ])
            ->add('adresse', TextareaType::class, [
                'label' => 'Adresse du cabinet',
                'attr' => ['placeholder' => 'Adresse complète du cabinet', 'rows' => 2],
                'constraints' => [
                    new NotBlank(['message' => 'L\'adresse est obligatoire']),
                ],
            ])
            ->add('prixConsultation', NumberType::class, [
                'label' => 'Prix de consultation (DT)',
                'attr' => ['placeholder' => '0.000', 'step' => '0.001', 'min' => '0'],
                'constraints' => [
                    new NotBlank(['message' => 'Le prix de consultation est obligatoire']),
                    new Positive(['message' => 'Le prix doit être positif']),
                ],
            ])
            ->add('bio', TextareaType::class, [
                'label' => 'Biographie / Présentation',
                'attr' => ['placeholder' => 'Présentez-vous et votre parcours professionnel', 'rows' => 4],
                'required' => false,
            ])
            ->add('photo', FileType::class, [
                'label' => 'Photo de profil',
                'required' => false,
                'mapped' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '5M',
                        'mimeTypes' => ['image/jpeg', 'image/png', 'image/webp'],
                        'mimeTypesMessage' => 'Veuillez télécharger une image (JPEG, PNG ou WebP)',
                    ]),
                ],
            ])
            ->add('certificate', FileType::class, [
                'label' => 'Certificat médical / Justificatif',
                'required' => true,
                'mapped' => false,
                'constraints' => [
                    new NotBlank(['message' => 'Le certificat est obligatoire']),
                    new File([
                        'maxSize' => '10M',
                        'mimeTypes' => ['image/jpeg', 'image/png', 'image/webp', 'application/pdf'],
                        'mimeTypesMessage' => 'Veuillez télécharger une image ou un PDF',
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Medecin::class,
        ]);
    }
}
