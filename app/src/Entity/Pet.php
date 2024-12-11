<?php

namespace App\Entity;

use App\Enum\PetTypesEnum;
use App\Repository\PetRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: PetRepository::class)]
#[ORM\Table(name: '`pet`')]
class Pet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255)]
    private string $name = '';

    #[ORM\Column(type: Types::STRING, enumType: PetTypesEnum::class)]
    private PetTypesEnum $type = PetTypesEnum::DOG;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): PetTypesEnum
    {
        return $this->type;
    }

    public function setType(PetTypesEnum $type): static
    {
        $this->type = $type;

        return $this;
    }
}
