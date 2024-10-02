<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CatalogueController extends AbstractController
{
    #[Route('/', name: 'app_catalogue')]
    public function catalogue(): Response
    {

        return $this->render('catalogue/app_catalogue.html.twig', [
            'controller_name' => 'app_catalogue',
        ]);
    }

    #[Route('/plats', name: 'app_plats')]
    public function plats(): Response
    {
        return $this->render('catalogue/app_plats.html.twig', [
            'controller_name' => 'app_plats',
        ]);
    }

    #[Route('/plats/{categorie_id}', name: 'app_plats_by_categorie')]
    public function plats_by_categorie(): Response
    {
        return $this->render('catalogue/app_plats_by_categorie.html.twig', [
            'controller_name' => 'app_plats_by_categorie',
        ]);
    }

    #[Route('/categories', name: 'app_categories')]
    public function categories(): Response
    {
        return $this->render('catalogue/app_categories.html.twig', [
            'controller_name' => 'app_categories',
        ]);
    }
}
