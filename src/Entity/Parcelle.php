<?php
namespace App\Entity;
use App\Enum\TypeSolEnum;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
/**
 * Classe métier parcelle protégée.
 * Représente une parcelle agricole dans le système.
 * NE PAS MODIFIER la logique métier sans validation !
 *
 * @author jeremyw30
 */
class Parcelle implements ParcelleInterface
{
    /**
     * Identifiant unique de la parcelle.
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    /**
     * Type de sol de la parcelle.
     * @var TypeSolEnum
     */
    #[ORM\Column(enumType: TypeSolEnum::class)]
    private TypeSolEnum $typeSol;

    /**
     * Retourne l'identifiant unique de la parcelle.
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Retourne le type de sol de la parcelle.
     * @return TypeSolEnum
     */
    public function getTypeSol(): TypeSolEnum
    {
        return $this->typeSol;
    }

    /**
     * Définit le type de sol de la parcelle.
     * @param TypeSolEnum $typeSol
     * @return self
     */
    public function setTypeSol(TypeSolEnum $typeSol): self
    {
        $this->typeSol = $typeSol;
        return $this;
    }
}