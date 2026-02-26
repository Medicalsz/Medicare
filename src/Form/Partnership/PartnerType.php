<?php

namespace App\Form\Partnership;

use App\Entity\Partnership\Partner;
use App\Enum\Partnership\StatutPartenaire;
use App\Enum\Partnership\TypePartenaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PartnerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('adresse', TextType::class, [
                'label' => 'Adresse',
            ])
            ->add('telephone', TextType::class, [
                'label' => 'Téléphone',
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
            ])
            ->add('imageFile', VichImageType::class, [
                'label' => 'Logo / Profile Picture',
                'required' => false,
                'allow_delete' => true,
                'download_uri' => true,
                'image_uri' => true,
                'asset_helper' => true,
            ])
            ->add('datePartenariat', DateType::class, [
                'label' => 'Date de Partenariat',
                'widget' => 'single_text',
                'html5' => true,
            ])
            ->add('typePartenaire', EnumType::class, [
                'class' => TypePartenaire::class,
                'choice_label' => fn (TypePartenaire $choice) => $choice->value,
                'label' => 'Type de Partenaire',
            ])
            ->add('statut', EnumType::class, [
                'class' => StatutPartenaire::class,
                'choice_label' => fn (StatutPartenaire $choice) => $choice->value,
                'label' => 'Statut',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Partner::class,
        ]);
    }
}
