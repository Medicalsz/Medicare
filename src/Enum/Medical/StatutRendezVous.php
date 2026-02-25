<?php

namespace App\Enum\Medical;

enum StatutRendezVous: string
{
    case EN_ATTENTE = 'EN_ATTENTE';
    case CONFIRME = 'CONFIRME';
    case ANNULE = 'ANNULE';
}
