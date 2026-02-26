<?php

namespace App\Enum\Medical;

enum TypeConsultation: string
{
    case PRESENTIELLE = 'PRESENTIELLE';
    case EN_LIGNE = 'EN_LIGNE';
    case URGENCE = 'URGENCE';
}
