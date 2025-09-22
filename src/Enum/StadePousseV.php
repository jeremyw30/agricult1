<?php

namespace App\Enum;

/**
 * Enum représentant les stades de pousse d'une culture en pourcentage.
 * Sert à suivre l'évolution d'une culture du semis jusqu'à la récolte.
 */
enum StadePousseEnum: string
{
    case SEMIS = '0%';               // Juste après plantation
    case LEVEE = '10-25%';           // Apparition des premières feuilles
    case VEGETATIVE = '26-60%';      // Croissance rapide
    case REPRODUCTIF = '61-85%';     // Fleurs, épis, gousses
    case MATURATION = '86-100%';     // Grains/graines en remplissage
}
