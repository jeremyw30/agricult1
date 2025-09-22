<?php

namespace App\Enum;

/**
 * Enum des races animales disponibles dans la région d'Autun (Bourgogne).
 */
enum AnimalAutunEnum: string
{
    // 🐄 Vaches
    case VACHE_CHAROLAISE = 'vache_charolaise';
    case VACHE_MONTBELIARDE = 'vache_montbeliarde';

    // 🐔 Poules
    case POULE_ROUSSE = 'poule_rousse';
    case POULE_BRESSE_GAULOISE = 'poule_bresse_gauloise';

    // 🐖 Porcs
    case PORC_LARGE_WHITE = 'porc_large_white';
    case PORC_DUROC = 'porc_duroc';

    // 🐑 Moutons
    case MOUTON_CHAROLLAIS = 'mouton_charollais';
    case MOUTON_ILE_DE_FRANCE = 'mouton_ile_de_france';

    // 🐐 Chèvres
    case CHEVRE_ALPINE = 'chevre_alpine';

    // 🐝 Abeilles
    case ABEILLE_BUCKFAST = 'abeille_buckfast';
}
