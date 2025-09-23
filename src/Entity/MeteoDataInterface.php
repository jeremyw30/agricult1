<?php
namespace App\Entity;

/**
 * Interface de protection pour la logique métier météo.
 * NE PAS MODIFIER la logique métier sans validation !
 */
interface MeteoDataInterface
{
    public function getTemperature(): ?float;
    public function getHumidity(): ?float;
    public function getPressure(): ?float;
    public function getZone(): ?string;
}
