<?php
namespace App\Entity;
use App\Enum\TypeSolEnum;

/**
 * Interface de protection pour la logique métier parcelle.
 * NE PAS MODIFIER la logique métier sans validation !
 */
interface ParcelleInterface
{
    public function getId(): ?int;
    public function getTypeSol(): TypeSolEnum;
}
