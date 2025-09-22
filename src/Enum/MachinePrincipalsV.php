<?php

namespace App\Enum;

enum MachineTypeEnum: string
{
    // 🚜 Tracteurs et travail du sol
    case TRACTEUR = 'tracteur';
    case CHARRUE = 'charrue';
    case DECHAUMEUR = 'dechaumeur';
    case HERSE = 'herse';
    case CULTIVATEUR = 'cultivateur';

    // 🌱 Semis et plantation
    case SEMOIR_CEREALES = 'semoir_cereales';
    case SEMOIR_PRECISION = 'semoir_precision';
    case PLANTEUSE = 'planteuse';

    // 💧 Fertilisation et entretien
    case EPANDEUR_FUMIER = 'epandeur_fumier';
    case CITERNE_LISIER = 'citerne_lisier';
    case EPANDEUR_ENGRAIS = 'epandeur_engrais';
    case PULVERISATEUR = 'pulverisateur';
    case BROYEUR = 'broyeur';
    case FAUCHEUSE = 'faucheuse';

    // 🌾 Récolte
    case MOISSONNEUSE = 'moissonneuse';
    case ENSILEUSE = 'ensileuse';
    case FAUCHEUSE_CONDITIONNEUSE = 'faucheuse_conditionneuse';
    case PRESSE_BALLES = 'presse_balles';
    case ANDAINEUSE = 'andaineuse';

    // 🚚 Transport
    case REMORQUE = 'remorque';
    case BENNE = 'benne';
    case PLATEAU = 'plateau';

    // 🐄 Élevage
    case MELANGEUSE = 'melangeuse';
    case RACLEUR_LISIER = 'racleur_lisier';
    case ROBOT_TRAITE = 'robot_traite';
    case ROBOT_REPOUSSE_FOURRAGE = 'robot_repousse_fourrage';

    // 🌳 Spécialisées
    case VENDANGEUSE = 'vendangeuse';
    case ARRACHEUSE_BETTERAVE = 'arracheuse_betterave';
    case ARRACHEUSE_POMME_TERRE = 'arracheuse_pomme_terre';
    case PULVERISATEUR_VERGER = 'pulverisateur_verger';
    case BROYEUR_BRANCHES = 'broyeur_branches';
}
