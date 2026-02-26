<?php

namespace App\Enum\Donation;

enum ModePaiement: string
{
    case CASH = 'cash';
    case VIREMENT = 'virement';
    case CARTE = 'carte';
    case MATERIEL = 'materiel';
}
