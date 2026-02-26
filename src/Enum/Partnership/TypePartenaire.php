<?php

namespace App\Enum\Partnership;

enum TypePartenaire: string
{
    case PHARMACIE = 'PHARMACIE';
    case LABORATOIRE = 'LABORATOIRE';
    case ASSURANCE = 'ASSURANCE';
    case CLINIQUE = 'CLINIQUE';
    case FOURNISSEUR = 'FOURNISSEUR';
}