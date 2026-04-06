<?php

namespace App\Form;

use App\Entity\Commande;
use App\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('product', EntityType::class, [
                'class' => Product::class,
                'choice_label' => fn(Product $p) => $p->getName() . ' (' . $p->getSku() . ') - $' . $p->getPrice(),
                'placeholder' => '-- Select Product --',
                'attr' => ['class' => 'form-select'],
                'label' => 'Product',
            ])
            ->add('quantity', IntegerType::class, [
                'attr' => ['class' => 'form-control', 'min' => 1],
                'label' => 'Quantity',
            ])
            ->add('status', ChoiceType::class, [
                'choices' => [
                    'Pending' => 'PENDING',
                    'Paid' => 'PAID',
                    'Cancelled' => 'CANCELLED',
                ],
                'attr' => ['class' => 'form-select'],
                'label' => 'Status',
            ])
            ->add('notes', TextareaType::class, [
                'required' => false,
                'attr' => ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Notes...'],
                'label' => 'Notes',
            ])
            ->add('deliveryDate', DateTimeType::class, [
                'required' => false,
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control'],
                'label' => 'Delivery Date',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
