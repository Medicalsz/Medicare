<?php

namespace App\Enum;

enum ProductType: string
{
    case VACCINE = 'vaccine';
    case MEDICATION = 'medication';
    case MEDICAL_SUPPLY = 'medical_supply';
    case VITAMIN = 'vitamin';
    case MEDICAL_DEVICE = 'medical_device';
    case INJECTABLE = 'injectable';

    public function getLabel(): string
    {
        return match ($this) {
            self::VACCINE => 'Vaccine',
            self::MEDICATION => 'Medication',
            self::MEDICAL_SUPPLY => 'Medical Supply',
            self::VITAMIN => 'Vitamin',
            self::MEDICAL_DEVICE => 'Medical Device',
            self::INJECTABLE => 'Injectable',
        };
    }

    public function getBadgeClass(): string
    {
        return match ($this) {
            self::VACCINE => 'badge-primary',
            self::MEDICATION => 'badge-info',
            self::MEDICAL_SUPPLY => 'badge-success',
            self::VITAMIN => 'badge-warning',
            self::MEDICAL_DEVICE => 'badge-danger',
            self::INJECTABLE => 'badge-secondary',
        };
    }

    public static function getChoices(): array
    {
        $choices = [];
        foreach (self::cases() as $case) {
            $choices[$case->getLabel()] = $case->value;
        }
        return $choices;
    }
}
