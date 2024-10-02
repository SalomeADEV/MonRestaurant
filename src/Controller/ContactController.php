<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_show_contact')]
    public function show_contact(): Response
    {
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'app_show_contact',
        ]);
    }
}
