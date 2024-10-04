<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CatalogueController extends AbstractController
{
    private $categorieRepo;
    private $platRepo;

    public function __construct(CategorieRepository $categorieRepo,PlatRepository $platRepo)
    {
        $this->categorieRepo = $categorieRepo;
        $this->platRepo = $platRepo;
    }

    #[Route('/', name: 'app_catalogue')]
    public function catalogue(): Response
    {
        $categories = $this->categorieRepo->findAll();
        $plats = $this->platRepo->findAll();

        return $this->render('catalogue/app_catalogue.html.twig', [
            'plats' => $plats,
            'categories' => $categories,
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
