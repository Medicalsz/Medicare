<?php

namespace App\Enum\Medical;

enum StatutDemandeMedecin: string
{
    case EN_ATTENTE = 'en_attente';
    case ACCEPTEE = 'acceptee';
    case REJETEE = 'rejetee';
}
