<?php

namespace App\Enum\Donation;

enum StatutCause: string
{
    case ACTIVE = 'active';
    case TERMINEE = 'terminée';
    case SUSPENDUE = 'suspendue';
}
