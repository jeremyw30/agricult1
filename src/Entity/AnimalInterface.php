<?php
namespace App\Entity;
use App\Enum\HealthProfileEnum;

/**
 * Interface de protection pour la logique métier animal.
 * NE PAS MODIFIER la logique métier sans validation !
 */
interface AnimalInterface
{
    public function getIdAnimal(): ?int;
    public function getType(): ?string;
    public function getHealthProfile(): HealthProfileEnum;
}
