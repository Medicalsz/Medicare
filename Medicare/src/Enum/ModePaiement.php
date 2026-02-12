<?php

namespace App\Enum;

enum ModePaiement: string
{
    case CASH = 'cash';
    case VIREMENT = 'virement';
    case CARTE = 'carte';
    case MATERIEL = 'materiel';
}
