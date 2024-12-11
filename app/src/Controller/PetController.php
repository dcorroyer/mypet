<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Pet;
use App\Form\PetFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PetController extends AbstractController
{
    public function __construct()
    {
    }

    #[Route(path: '/pets', name: 'app_pet_create')]
    public function create(Request $request): Response
    {
        $pet = new Pet();
        $form = $this->createForm(PetFormType::class, $pet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->redirectToRoute('app_default');
        }

        return $this->render('pet/create.html.twig', [
            'createPetForm' => $form->createView(),
        ]);
    }
}
