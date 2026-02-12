<?php

namespace App\Enum;

enum StatutCause: string
{
    case ACTIVE = 'active';
    case TERMINEE = 'terminée';
    case SUSPENDUE = 'suspendue';
}
