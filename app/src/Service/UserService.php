<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserService
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly UserPasswordHasherInterface $passwordHasher,
    )
    {
    }

    public function createUser(User $user, string $password): int
    {
        $user->setPassword($this->passwordHasher->hashPassword($user, $password));

        return $this->userRepository->save($user, true);
    }
}