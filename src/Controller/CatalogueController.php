<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CatalogueController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        return $this->render('catalogue/index.html.twig', [
            'controller_name' => 'CatalogueController',
        ]);
    }

    #[Route('/plats', name: 'app_plats')]
    public function plats(): Response
    {
        return $this->render('catalogue/index.html.twig', [
            'controller_name' => 'CatalogueController',
        ]);
    }

    #[Route('/plats/{categorie_id}', name: 'app_plats_cat', requirements:['categorie_id' => '/d+'])]
    public function platsCategorie(): Response
    {
        return $this->render('catalogue/index.html.twig', [
            'controller_name' => 'CatalogueController',
        ]);
    }

    #[Route('/categories', name: 'app_categories', requirements:['categorie_id' => '/d+'])]
    public function Categories(): Response
    {
        return $this->render('catalogue/index.html.twig', [
            'controller_name' => 'CatalogueController',
        ]);
    }
}
