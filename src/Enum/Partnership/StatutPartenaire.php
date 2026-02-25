<?php

namespace App\Enum\Partnership;

enum StatutPartenaire: string
{
    case ACTIF = 'ACTIF';
    case SUSPENDU = 'SUSPENDU';
    case RESILIE = 'RESILIE';
}