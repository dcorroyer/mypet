<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Pet;
use App\Repository\Common\AbstractEntityRepository;

/**
 * @extends AbstractEntityRepository<Pet>
 */
class PetRepository extends AbstractEntityRepository
{
    #[\Override]
    public function getEntityClass(): string
    {
        return Pet::class;
    }
}
