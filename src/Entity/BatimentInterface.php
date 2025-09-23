<?php
namespace App\Entity;
use App\Enum\BatimentTypeEnum;

/**
 * Interface de protection pour la logique métier bâtiment.
 * NE PAS MODIFIER la logique métier sans validation !
 */
interface BatimentInterface
{
    public function getIdBatiment(): ?int;
    public function getName(): ?string;
    public function getType(): ?BatimentTypeEnum;
}
