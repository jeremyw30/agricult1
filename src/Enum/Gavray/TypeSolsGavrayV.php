<?php

namespace App\Enum;

/**
 * Enum des types de sols propres à la région de Gavray (Normandie).
 * Utilisé pour caractériser les parcelles et influencer le gameplay.
 */
enum TypeSolGavrayEnum: string
{
    case LIMONEUX = 'LIM';            // Polyvalent, sol de base pour céréales et fourrage
    case ARGILO_LIMONEUX = 'ALI';     // Fertile mais lourd, idéal pour maïs et colza
    case TOURBEUX = 'TOU';            // Zones humides, adapté à herbe et maïs
    case HYDROMORPHE = 'HYD';         // Drainage nécessaire, prairies difficiles
    case LIMONEUX_CAILLOUTEUX = 'LCA'; // Drainant mais moins fertile, bon pour orge
}
