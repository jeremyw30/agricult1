<?php
namespace App\Enum;

enum TypeSolEnum: string
{
    case LIM = 'LIM'; // Limoneux
    case ALI = 'ALI'; // Argilo-limoneux
    case TOU = 'TOU'; // Tourbeux
    case HYD = 'HYD'; // Hydromorphe
    case LCA = 'LCA'; // Limoneux-caillouteux
}
