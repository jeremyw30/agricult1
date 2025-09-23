<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use App\Enum\HealthProfileEnum;
use App\Enum\GenderEnum;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
#[ORM\Table(name: 'animal')]
/**
 * Classe métier animal protégée.
 * Représente un animal dans le système agricole.
 * NE PAS MODIFIER la logique métier sans validation !
 *
 * @author jeremyw30
 */
class Animal implements AnimalInterface
{
    /**
     * Identifiant unique de l'animal.
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_animal')]
    private ?int $idAnimal = null;

    /**
     * Type d'animal (ex: vache, mouton, poule).
     * @var string|null
     */
    #[ORM\Column(length: 50)]
    private ?string $type = null;

    /**
     * Poids de base en kilogrammes.
     * @var string|null
     */
    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2)]
    private ?string $baseWeightKg = null;

    /**
     * Prix de base de l'animal.
     * @var string|null
     */
    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2)]
    private ?string $basePrice = null;

    /**
     * Productivité moyenne (ex: lait/jour).
     * @var string|null
     */
    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2, nullable: true)]
    private ?string $averageProductivity = null;

    /**
     * Profil de santé de l'animal.
     * @var HealthProfileEnum
     */
    #[ORM\Column(type: Types::STRING, enumType: HealthProfileEnum::class)]
    private HealthProfileEnum $healthProfile = HealthProfileEnum::EXCELLENT;

    /**
     * Durée du cycle de reproduction en jours.
     * @var int|null
     */
    #[ORM\Column]
    private ?int $reproductionCycleDays = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(length: 50)]
    private ?string $breed = null;

    #[ORM\Column(type: Types::STRING, enumType: GenderEnum::class)]
    private ?GenderEnum $gender = null;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    /**
     * Retourne l'identifiant unique de l'animal.
     * @return int|null
     */
    public function getIdAnimal(): ?int
    {
        return $this->idAnimal;
    }

    /**
     * Retourne le type d'animal.
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;
        return $this;
    }

    public function getBaseWeightKg(): ?string
    {
        return $this->baseWeightKg;
    }

    public function setBaseWeightKg(string $baseWeightKg): static
    {
        $this->baseWeightKg = $baseWeightKg;
        return $this;
    }

    public function getBasePrice(): ?string
    {
        return $this->basePrice;
    }

    public function setBasePrice(string $basePrice): static
    {
        $this->basePrice = $basePrice;
        return $this;
    }

    public function getAverageProductivity(): ?string
    {
        return $this->averageProductivity;
    }

    public function setAverageProductivity(?string $averageProductivity): static
    {
        $this->averageProductivity = $averageProductivity;
        return $this;
    }

    /**
     * Retourne le profil de santé de l'animal.
     * @return HealthProfileEnum
     */
    public function getHealthProfile(): HealthProfileEnum
    {
        return $this->healthProfile;
    }

    public function setHealthProfile(HealthProfileEnum $healthProfile): static
    {
        $this->healthProfile = $healthProfile;
        return $this;
    }

    public function getReproductionCycleDays(): ?int
    {
        return $this->reproductionCycleDays;
    }

    public function setReproductionCycleDays(int $reproductionCycleDays): static
    {
        $this->reproductionCycleDays = $reproductionCycleDays;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getBreed(): ?string
    {
        return $this->breed;
    }

    public function setBreed(string $breed): static
    {
        $this->breed = $breed;
        return $this;
    }

    public function getGender(): ?GenderEnum
    {
        return $this->gender;
    }

    public function setGender(GenderEnum $gender): static
    {
        $this->gender = $gender;
        return $this;
    }
}