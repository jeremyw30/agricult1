<?php

namespace App\Entity;

use App\Repository\BatimentRepository;
use App\Enum\BatimentTypeEnum;
use App\Enum\ConditionStatusEnum;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BatimentRepository::class)]
#[ORM\Table(name: 'batiment')]
/**
 * Classe métier bâtiment protégée.
 * Représente un bâtiment agricole dans le système.
 * NE PAS MODIFIER la logique métier sans validation !
 *
 * @author jeremyw30
 */
class Batiment implements BatimentInterface
{
    /**
     * Identifiant unique du bâtiment.
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_batiment')]
    private ?int $idBatiment = null;

    /**
     * Nom du bâtiment.
     * @var string|null
     */
    #[ORM\Column(length: 100)]
    private ?string $name = null;

    /**
     * Type du bâtiment (enum).
     * @var BatimentTypeEnum|null
     */
    #[ORM\Column(type: Types::STRING, enumType: BatimentTypeEnum::class)]
    private ?BatimentTypeEnum $type = null;

    /**
     * Surface en m².
     * @var string|null
     */
    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2)]
    private ?string $surfaceM2 = null;

    /**
     * Capacité de stockage.
     * @var int|null
     */
    #[ORM\Column(nullable: true)]
    private ?int $storageCapacity = null;

    /**
     * Prix de base du bâtiment.
     * @var string|null
     */
    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2)]
    private ?string $basePrice = null;

    #[ORM\Column(type: Types::STRING, enumType: ConditionStatusEnum::class)]
    private ConditionStatusEnum $conditionStatus = ConditionStatusEnum::OPTIMAL;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?int $animalCapacity = null;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getIdBatiment(): ?int
    {
        return $this->idBatiment;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getType(): ?BatimentTypeEnum
    {
        return $this->type;
    }

    public function setType(BatimentTypeEnum $type): static
    {
        $this->type = $type;
        return $this;
    }

    public function getSurfaceM2(): ?string
    {
        return $this->surfaceM2;
    }

    public function setSurfaceM2(string $surfaceM2): static
    {
        $this->surfaceM2 = $surfaceM2;
        return $this;
    }

    public function getStorageCapacity(): ?int
    {
        return $this->storageCapacity;
    }

    public function setStorageCapacity(?int $storageCapacity): static
    {
        $this->storageCapacity = $storageCapacity;
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

    public function getConditionStatus(): ConditionStatusEnum
    {
        return $this->conditionStatus;
    }

    public function setConditionStatus(ConditionStatusEnum $conditionStatus): static
    {
        $this->conditionStatus = $conditionStatus;
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

    public function getAnimalCapacity(): ?int
    {
        return $this->animalCapacity;
    }

    public function setAnimalCapacity(int $animalCapacity): static
    {
        $this->animalCapacity = $animalCapacity;
        return $this;
    }
}