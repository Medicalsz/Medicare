<?php

namespace App\Enum;

enum TunisianCity: string
{
    case TUNIS = 'Tunis';
    case SFAX = 'Sfax';
    case SOUSSE = 'Sousse';
    case KAIROUAN = 'Kairouan';
    case BIZERTE = 'Bizerte';
    case GABES = 'Gabès';
    case ARIANA = 'Ariana';
    case GAFSA = 'Gafsa';
    case MONASTIR = 'Monastir';
    case NABEUL = 'Nabeul';
    case ZAGHOUAN = 'Zaghouan';
    case BEN_AROUS = 'Ben Arous';
    case MANNOUBA = 'Mannouba';
    case KASSERINE = 'Kasserine';
    case KEBILI = 'Kébili';
    case TATAOUINE = 'Tataouine';
    case JENDOUBA = 'Jendouba';
    case BEJA = 'Béja';
    case SILIANA = 'Siliana';
    case BOURGELATERRE = 'Bourgelaterre';
    case MEDENINE = 'Médenine';
    case TOZEUR = 'Tozeur';
    case KEF = 'Le Kef';
    case SIDI_BOUZID = 'Sidi Bouzid';

    public static function toArray(): array
    {
        $choices = [];
        foreach (self::cases() as $case) {
            $choices[$case->value] = $case->value;
        }
        return $choices;
    }
}
