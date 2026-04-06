<?php

namespace App\Form;

use App\Entity\Product;
use App\Enum\ProductType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Product name'],
                'label' => 'Name',
            ])
            ->add('description', TextareaType::class, [
                'required' => false,
                'attr' => ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Description'],
                'label' => 'Description',
            ])
            ->add('sku', TextType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'SKU-001'],
                'label' => 'SKU',
            ])
            ->add('price', MoneyType::class, [
                'currency' => 'USD',
                'attr' => ['class' => 'form-control'],
                'label' => 'Price',
            ])
            ->add('quantity', IntegerType::class, [
                'attr' => ['class' => 'form-control', 'min' => 0],
                'label' => 'Quantity',
            ])
            ->add('type', EnumType::class, [
                'class' => ProductType::class,
                'choice_label' => fn(ProductType $type) => $type->getLabel(),
                'placeholder' => '-- Select Type --',
                'attr' => ['class' => 'form-select'],
                'label' => 'Type',
            ])
            ->add('dosage', TextType::class, [
                'required' => false,
                'attr' => ['class' => 'form-control', 'placeholder' => 'e.g. 500mg'],
                'label' => 'Dosage',
            ])
            ->add('expiryDate', DateTimeType::class, [
                'required' => false,
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control'],
                'label' => 'Expiry Date',
            ])
            ->add('isActive', CheckboxType::class, [
                'required' => false,
                'label' => 'Active',
                'attr' => ['class' => 'form-check-input'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
