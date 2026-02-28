<?php

namespace App\Form\Partnership;

use App\Entity\Partnership\PartnerRating;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartnerRatingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('rating', ChoiceType::class, [
                'label' => 'Your Rating',
                'choices' => [
                    '5 stars' => 5,
                    '4 stars' => 4,
                    '3 stars' => 3,
                    '2 stars' => 2,
                    '1 star' => 1,
                ],
                'expanded' => true,
                'multiple' => false,
                'label_attr' => ['class' => 'd-none'], // Hide the main label, we use CSS for stars
            ])
            ->add('comment', TextareaType::class, [
                'label' => 'Your comment (optional)',
                'required' => false,
                'attr' => ['rows' => 4, 'placeholder' => 'Share your experience...'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PartnerRating::class,
        ]);
    }
}