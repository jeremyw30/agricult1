<?php

namespace App\Enum\Gavray;

/**
 * Enum des bâtiments agricoles pour la région Gavray (Normandie).
 */
enum BatimentsGavrayV: string
{
    // 🌾 Cultures / Stockage
    case HANGAR_MATERIEL = 'hangar_materiel';
    case HANGAR_PAILLE = 'hangar_paille';
    case SILO_GRAINS = 'silo_grains';
    case SILO_MAIS_ENSILAGE = 'silo_mais_ensilage';
    case RESERVE_SEMENCES = 'reserve_semences';
    case RESERVE_ENGRAIS = 'reserve_engrais';
    case RESERVE_PHYTO = 'reserve_phytosanitaires';
    case CITERNE_EAU = 'citerne_eau';

    // 🐮 Bovins
    case ETABLE_LAITIERES = 'etable_laitieres';
    case ETABLE_ALLAITANTES = 'etable_allaitantes';
    case SALLE_TRAITE = 'salle_traite';
    case FOSSE_LISIER_BOVIN = 'fosse_lisier_bovin';

    // 🐷 Porcs
    case PORCHERIE = 'porcherie';
    case FOSSE_LISIER_PORCIN = 'fosse_lisier_porcin';

    // 🐔 Poules
    case POULAILLER_PONDEUSES = 'poulailler_pondeuses';
    case POULAILLER_CHAIR = 'poulailler_chair';
    case STOCK_OEUFS = 'stock_oeufs';

    // 🐑 Moutons
    case BERGERIE = 'bergerie';
    case SALLE_TONTE = 'salle_tonte';
    case ABRI_PATURE = 'abri_pature';

    // 🧬 Transformation / Vente
    case FROMAGERIE = 'fromagerie';
    case ATELIER_VIANDE = 'atelier_viande';
    case MINI_LAITERIE = 'mini_laiterie';
    case MAGASIN_VENTE = 'magasin_vente';
    case ATELIER_BARQUETTE = 'atelier_barquette';

    // ⚙️ Autres
    case GARAGE = 'garage';
    case ATELIER_MECANIQUE = 'atelier_mecanique';
    case BUREAU_GESTION = 'bureau_gestion';
    case LABO_SEMENCES = 'laboratoire_semences';
    case CHAMBRE_FROIDE = 'chambre_froide';
    case SERRE = 'serre';

    // 💬 Bonus / Futur
    case MAISON_FERMIER = 'maison_fermier';
    case CENTRE_VETERINAIRE = 'centre_veterinaire';
    case SALLE_FORMATION = 'salle_formation';
    case CENTRALE_BIOGAZ = 'centrale_biogaz';
}
