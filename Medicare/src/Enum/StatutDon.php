<?php

namespace App\Enum;

enum StatutDon: string
{
    case EN_ATTENTE = 'en attente';
    case CONFIRME = 'confirmé';
    case ANNULE = 'annulé';
}
