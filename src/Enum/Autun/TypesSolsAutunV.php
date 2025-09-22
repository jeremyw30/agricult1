<?php

namespace App\Enum;

/**
 * Enum des types de sols propres à la région d'Autun (Bourgogne).
 * Utilisé pour caractériser les parcelles et influencer le gameplay
 * (fertilité, cultures adaptées, contraintes mécaniques).
 */
enum TypeSolAutun: string
{
    case ARGILEUX_PROFOND = 'ARG';   // Fertile mais lourd, demande bonnes machines
    case LIMONEUX_BRUN = 'LIM';      // Parfait pour céréales, attention au ruissellement
    case LIMONO_ARGILEUX = 'LIA';    // Équilibré, bon rendement sans excès d’eau
    case CALCAIRE_SUPERFICIEL = 'CAL'; // Plus difficile, bon pour cultures résistantes
    case HYDROMORPHE_LEGER = 'HYD';  // Zone spéciale, faible fertilité sans drainage
}
