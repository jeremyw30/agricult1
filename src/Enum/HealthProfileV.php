<?php

namespace App\Enum;

/**
 * Enum des profils de santé exprimés comme indicateurs de performance.
 */
enum HealthProfileEnum: string
{
    case EXCELLENT = 'excellent';     // Santé optimale, productivité maximale
    case CORRECT = 'correct';         // État satisfaisant, mais améliorable
    case MOYEN = 'moyen';             // Performances réduites, vigilance requise
    case DEGRADE = 'degrade';         // Santé compromise, baisse notable de production
    case CRITIQUE = 'critique';       // Situation critique, perte imminente
}
