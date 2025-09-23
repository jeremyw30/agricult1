<?php

namespace App\Enum\Gavray;

/**
 * Enum des races animales disponibles dans la région de Gavray (Normandie).
 */
enum AnimauxGavrayV: string
{
    // 🐄 Vaches
    case VACHE_NORMANDE = 'vache_normande';
    case VACHE_PRIM_HOLSTEIN = 'vache_prim_holstein';
    case VACHE_BRUNE_ALPES = 'vache_brune_alpes';
    case VACHE_MONTBELIARDE = 'vache_montbeliarde';
    case VACHE_CHAROLAISE = 'vache_charolaise';

    // 🐔 Poules
    case POULE_ROUSSE = 'poule_rousse';
    case POULE_MARANS = 'poule_marans';
    case POULE_GOURNAY = 'poule_gournay';
    case POULE_PEKIN_SOIE = 'poule_pekin_soie';

    // 🐖 Porcs
    case PORC_LARGE_WHITE = 'porc_large_white';
    case PORC_LANDRACE = 'porc_landrace';
    case PORC_BLANC_OUEST = 'porc_blanc_ouest';

    // 🐑 Moutons
    case MOUTON_AVRANCHIN = 'mouton_avranchin';
    case MOUTON_TEXEL = 'mouton_texel';
    case MOUTON_ROUGE_OUEST = 'mouton_rouge_ouest';
    case MOUTON_OUESSANT = 'mouton_ouessant';

    // 🐐 Chèvres
    case CHEVRE_POITEVINE = 'chevre_poitevine';
    case CHEVRE_ALPINE = 'chevre_alpine';

    // 🐝 Abeilles
    case ABEILLE_NOIRE_NORMANDE = 'abeille_noire_normande';
    case ABEILLE_BUCKFAST = 'abeille_buckfast';
}
