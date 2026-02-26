<?php

namespace App\Enum\Partnership;

enum StatutCollaboration: string
{
    case EN_COURS = 'EN_COURS';
    case TERMINEE = 'TERMINEE';
    case ANNULEE = 'ANNULEE';
    case EN_ATTENTE = 'EN_ATTENTE';
}