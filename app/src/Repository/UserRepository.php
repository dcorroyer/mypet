<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\User;
use App\Repository\Common\AbstractEntityRepository;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @extends AbstractEntityRepository<User>
 *
 * @implements PasswordUpgraderInterface<User>
 */
class UserRepository extends AbstractEntityRepository implements PasswordUpgraderInterface
{
    #[\Override]
    public function getEntityClass(): string
    {
        return User::class;
    }

    #[\Override]
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (! $user instanceof User) {
            throw new UnsupportedUserException(\sprintf('Instances of "%s" are not supported.', User::class));
        }

        $user->setPassword($newHashedPassword);
        $this->getEntityManager()
            ->persist($user)
        ;
        $this->getEntityManager()
            ->flush()
        ;
    }
}
