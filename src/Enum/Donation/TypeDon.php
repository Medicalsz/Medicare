<?php

namespace App\Enum\Donation;

enum TypeDon: string
{
    case ARGENT = 'argent';
    case MATERIEL = 'matériel';
    case MEDICAMENT = 'médicament';
}
