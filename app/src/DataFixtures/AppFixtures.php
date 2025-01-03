<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\User;
use App\Tests\Common\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(
        private readonly UserPasswordHasherInterface $passwordEncoder
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        // Création du user
        $user = new User();
        $hashedPassword = $this->passwordEncoder->hashPassword($user, 'password');

        UserFactory::new([
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'john.doe@admin.local',
            'password' => $hashedPassword,
        ])->create();
    }
}
