<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PanierController extends AbstractController
{

    #[Route('/panier/ajout/{id}', name: 'app_add_plat')]
    public function add_plat(): Response
    {
        return $this->render('panier/index.html.twig', [
            'controller_name' => 'app_add_plat',
        ]);
    }

    #[Route('/panier', name: 'app_show_panier')]
    public function show_panier(): Response
    {
        return $this->render('panier/index.html.twig', [
            'controller_name' => 'app_show_panier',
        ]);
    }
}
