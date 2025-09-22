<?php
namespace App\Entity;
use App\Enum\TypeSolEnum;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Parcelle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
    // ...

    #[ORM\Column(enumType: TypeSolEnum::class)]
    private TypeSolEnum $typeSol;   // ← PAS string

    public function getTypeSol(): TypeSolEnum
    {
        return $this->typeSol;
    }
    public function setTypeSol(TypeSolEnum $typeSol): self
    {
        $this->typeSol = $typeSol;
        return $this;
    }
}