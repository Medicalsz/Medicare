<?php

namespace App\Enum;

enum MedicalSpecialty: string
{
    case GENERALISTE = 'Médecin Généraliste';
    case CARDIOLOGUE = 'Cardiologue';
    case DERMATOLOGUE = 'Dermatologue';
    case PEDIATRE = 'Pédiatre';
    case GYNECOLOGUE = 'Gynécologue';
    case NEUROLOGUE = 'Neurologue';
    case PSYCHIATRE = 'Psychiatre';
    case OPHTALMOLOGUE = 'Ophtalmologue';
    case ORL = 'ORL (Oto-Rhino-Laryngologie)';
    case DENTISTE = 'Dentiste';
    case ORTHOPEDISTE = 'Orthopédiste';
    case UROLOGUE = 'Urologue';
    case GASTROENTEROLOGUE = 'Gastroentérologue';
    case PNEUMOLOGUE = 'Pneumologue';
    case ENDOCRINOLOGUE = 'Endocrinologue';
    case RADIOLOGIE = 'Radiologie';
    case ANESTHESISTE = 'Anesthésiste';
    case CHIRURGIEN = 'Chirurgien';
    case MEDECIN_DU_TRAVAIL = 'Médecin du Travail';
    case SPORT = 'Médecin du Sport';
    case HOMEOPATHE = 'Homéopathe';
    case ACUPUNCTEUR = 'Acupuncteur';
    case PHYSIOTHERAPEUTE = 'Physiothérapeute';
    case KINESITHERAPEUTE = 'Kinésithérapeute';
    case OSTEOPATHE = 'Ostéopathe';
    case NUTRITIONNISTE = 'Nutritionniste';
    case DIABETOLOGUE = 'Diabétologue';
    case NEPHROLOGUE = 'Néphrologue';
    case REUMATOLOGUE = 'Rhumatologue';
    case ALLERGOLOGUE = 'Allergologue';
    case ONCOLOGUE = 'Oncologue';
    case HEMATOLOGUE = 'Hématologue';
    case IMMUNOLOGUE = 'Immunologue';
    case GERIATRE = 'Gériatre';
    case URGENTISTE = 'Urgentiste';

    public static function toArray(): array
    {
        $choices = [];
        foreach (self::cases() as $case) {
            $choices[$case->value] = $case->value;
        }
        return $choices;
    }
}
