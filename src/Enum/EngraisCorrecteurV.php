<?php

namespace App\Enum;

/**
 * Enum des engrais et amendements disponibles dans Agri-Cult.
 * Chaque produit peut exposer son type, sa dose standard et son moment d'application.
 */
enum EngraisEnum: string
{
    case UREE = 'urée';
    case AMMONITRATE = 'ammonitrate';
    case SUPERPHOSPHATE = 'superphosphate';
    case SULFATE_POTASSIUM = 'sulfate_potassium';
    case CHLORURE_POTASSIUM = 'chlorure_potassium';
    case SULFATE_AMMONIUM = 'sulfate_ammonium';
    case CHAUX = 'chaux_agricole';
    case CHAUX_MAGNESIENNE = 'chaux_magnesienne';
    case CHELATE_FER = 'chelate_fer';
    case SULFATE_ZINC = 'sulfate_zinc';
    case SULFATE_CUIVRE = 'sulfate_cuivre';
    case BORAX = 'borax';
    case ACIDE_BORIQUE = 'acide_borique';
    case SULFATE_MANGANESE = 'sulfate_manganese';
    case MOLYBDATE_AMMONIUM = 'molybdate_ammonium';

    /**
     * Retourne le type d'engrais (minéral, amendement, foliaire…).
     */
    public function type(): string
    {
        return match($this) {
            self::UREE, self::AMMONITRATE, self::SUPERPHOSPHATE,
            self::SULFATE_POTASSIUM, self::CHLORURE_POTASSIUM,
            self::SULFATE_AMMONIUM => 'Minéral',

            self::CHAUX, self::CHAUX_MAGNESIENNE => 'Amendement',

            self::CHELATE_FER, self::SULFATE_ZINC,
            self::SULFATE_CUIVRE, self::BORAX,
            self::ACIDE_BORIQUE => 'Foliaire / Sol',

            self::SULFATE_MANGANESE, self::MOLYBDATE_AMMONIUM => 'Sol',
        };
    }

    /**
     * Retourne la dose standard recommandée (texte).
     */
    public function doseStandard(): string
    {
        return match($this) {
            self::UREE, self::AMMONITRATE => '50–100 kg/ha',
            self::SUPERPHOSPHATE => '30–60 kg/ha',
            self::SULFATE_POTASSIUM, self::CHLORURE_POTASSIUM => '30–60 kg/ha',
            self::SULFATE_AMMONIUM => '20–40 kg/ha',
            self::CHAUX => '1–3 t/ha',
            self::CHAUX_MAGNESIENNE => '1–2 t/ha',
            self::CHELATE_FER => '10–15 kg/ha',
            self::SULFATE_ZINC => '5–10 kg/ha',
            self::SULFATE_CUIVRE => '3–6 kg/ha',
            self::BORAX, self::ACIDE_BORIQUE => '1–2 kg/ha',
            self::SULFATE_MANGANESE => '5–10 kg/ha',
            self::MOLYBDATE_AMMONIUM => '50–150 g/ha',
        };
    }

    /**
     * Retourne le moment idéal d'application.
     */
    public function momentIdeal(): string
    {
        return match($this) {
            self::UREE, self::AMMONITRATE => 'Croissance (26–60%)',
            self::SUPERPHOSPHATE => 'Semis',
            self::SULFATE_POTASSIUM, self::CHLORURE_POTASSIUM => 'Avant croissance',
            self::SULFATE_AMMONIUM => 'Croissance & maturation',
            self::CHAUX => 'Avant semis',
            self::CHAUX_MAGNESIENNE => 'Préparation du sol',
            self::CHELATE_FER => 'Croissance',
            self::SULFATE_ZINC => 'Croissance',
            self::SULFATE_CUIVRE => 'Pré-floraison',
            self::BORAX, self::ACIDE_BORIQUE => 'Levée / floraison',
            self::SULFATE_MANGANESE => 'Croissance',
            self::MOLYBDATE_AMMONIUM => 'Semis',
        };
    }
}
