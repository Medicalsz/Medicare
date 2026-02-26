<?php

namespace App\Form\Partnership;

use App\Entity\Partnership\Collaboration;
use App\Entity\Partnership\Partner;
use App\Enum\Partnership\StatutCollaboration;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CollaborationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => 'Titre',
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'required' => false,
            ])
            ->add('imageFile', VichImageType::class, [
                'label' => 'Image',
                'required' => false,
                'allow_delete' => true,
                'download_uri' => true,
                'image_uri' => true,
                'asset_helper' => true,
            ])
            ->add('imageFile', VichImageType::class, [
                'label' => 'Image',
                'required' => false,
                'allow_delete' => true,
                'download_uri' => true,
                'image_uri' => true,
                'asset_helper' => true,
            ])
            ->add('dateDebut', DateType::class, [
                'label' => 'Date de Début',
                'widget' => 'single_text',
                'html5' => true,
            ])
            ->add('dateFin', DateType::class, [
                'label' => 'Date de Fin',
                'widget' => 'single_text',
                'html5' => true,
                'required' => false,
            ])
            ->add('statut', EnumType::class, [
                'class' => StatutCollaboration::class,
                'choice_label' => fn (StatutCollaboration $choice) => $choice->value,
                'label' => 'Statut',
            ])
            ->add('partner', EntityType::class, [
                'class' => Partner::class,
                'choice_label' => 'name', // Assuming Partner has a 'name' property
                'label' => 'Partenaire',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Collaboration::class,
        ]);
    }
}
