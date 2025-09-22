<?php

namespace App\Enum;

/**
 * Enum des micro-nutriments principaux et du pH du sol.
 * Utilisé pour représenter les éléments clés liés à la fertilité du sol
 * et aux besoins des cultures dans tout le projet Agri-Cult.
 */
enum MicroNutriment: string
{
    case FER = 'Fer';
    case ZINC = 'Zinc';
    case CUIVRE = 'Cuivre';
    case BORE = 'Bore';
    case MANGANESE = 'Manganese';
    case MOLYBDENE = 'Molybdene';
    case SOUFRE = 'Soufre';
    case CALCIUM = 'Calcium';
    case MAGNESIUM = 'Magnesium';
    case PH = 'pH du sol';
}
