<?php

namespace App\Controller;

use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PanierController extends AbstractController
{
    private $requestStack;
    private $PlatRepo;

    public function __construct(RequestStack $requestStack,PlatRepository $PlatRepo)
    {
        $this->requestStack = $requestStack;
        $this->PlatRepo= $PlatRepo;
    }

    #[Route('/panier/ajout/{id}', name: 'app_add_plat')]
    public function add_plat(int $id): Response
    {
        $session = $this->requestStack->getSession();
        $panier = $session->get('panier', []);// Récupère le panier ou un tableau vide
        // $id = $this->PlatRepo->find($id);// Récupère l'ID du plat
    
        // Si le plat est déjà dans le panier, on incrémente la quantité, sinon on l'ajoute
        if (!empty($panier[$id])){
            $panier[$id]++;
        } else{
            $panier[$id] = 1;
        }
    
        // Sauvegarde le panier mis à jour dans la session
        $session->set('panier', $panier);
        return $this->redirectToRoute("app_show_panier");
    }

    #[Route('/panier', name: 'app_show_panier')]
    public function show_panier(): Response
    {
        $session = $this->requestStack->getSession();
        $panier = $session->get("panier", []);

        $dataPanier = [];
        $total = 0;  

        foreach($panier as $id => $quantite){
            $plat = $this->PlatRepo->find($id);
            $dataPanier[] = [
                "plat" => $plat ,   // Ajoute l'objet Plat dans le tableau
                "quantite" => $quantite  // Ajoute la quantité associée au plat
            ];
            $total += $plat->getPrix() * $quantite;
        }
        return $this->render('panier/index.html.twig', compact("dataPanier","total"));
        // $panier = $session->get("panier", []);
        // $panier= [
        //     "1" => 1,
        //     "2" => 3
        // ];

    }

    #[Route('/panier/removeone/{id}', name: 'app_remove_one_plat')]
    public function removeone_plat(int $id): Response
    {
        $session = $this->requestStack->getSession();
        $panier = $session->get('panier', []);// Récupère le panier ou un tableau vide
      
        // Si le plat est déjà dans le panier, on incrémente la quantité, sinon on l'ajoute
        if (!empty($panier[$id])){
            if ($panier[$id] > 1){
            $panier[$id]--;
        } else {
            unset($panier[$id]); // Si la quantité est 1, on supprime le plat du panier
        }}
    
        // Sauvegarde le panier mis à jour dans la session
        $session->set('panier', $panier);
        return $this->redirectToRoute("app_show_panier");
    }

    #[Route('/panier/remove/{id}', name: 'app_remove_plat')]
    public function remove_plat(int $id): Response
    {
        $session = $this->requestStack->getSession();
        $panier = $session->get('panier', []); // Récupère le panier

        // Si le plat est dans le panier, on le supprime
        if (!empty($panier[$id])){
            unset($panier[$id]);}

        // Sauvegarde le panier mis à jour dans la session
        $session->set('panier', $panier);
        return $this->redirectToRoute("app_show_panier");
    }

    #[Route('/panier/removeall', name: 'app_remove_all_plat')]
    public function removeall_plat(): Response
    {
        $session = $this->requestStack->getSession();
        // Supprime tous les plats du panier en le réinitialisant à un tableau vide
        $session->set('panier', []);
        return $this->redirectToRoute("app_show_panier");
    }
}
