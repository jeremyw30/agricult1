<?php

namespace App\Enum;

/**
 * Enum de l'état agronomique d'une parcelle.
 * Utilisé pour exprimer le potentiel de production en langage technique agricole.
 */
enum ConditionStatusEnum: string
{
    case OPTIMAL = 'optimal';              // Fertilité et structure excellentes
    case FAVORABLE = 'favorable';          // Bonnes conditions agronomiques
    case LIMITANT = 'limitant';            // Sol correct mais avec facteurs contraignants
    case DEGRADE = 'degrade';              // Fertilité réduite, état physique/organique pauvre
    case CRITIQUE = 'critique';            // Très faible potentiel, improductif sans correction
}
 

/**🧑‍🌾 Interprétation professionnelle

OPTIMAL → “Sol équilibré, riche, idéal pour la culture.”

FAVORABLE → “Bonne base agronomique, rendement stable.”

LIMITANT → “Présence de contraintes (pH, structure, nutriments).”

DEGRADE → “Déficit marqué, baisse forte de rendement.”

CRITIQUE → “Sol quasi-improductif sans intervention (drainage, amendement).”

🎮 Dans Agri-Cult

                                !!!! Tu peux directement associer un bonus/malus de rendement :!!!!
OPTIMAL = +100%

FAVORABLE = 90%

LIMITANT = 75%

DEGRADE = 50%

CRITIQUE = 20%
*/