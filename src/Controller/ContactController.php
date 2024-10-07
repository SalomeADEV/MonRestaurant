<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
// use App\Symfony\Component\Controller\ContactType;
// use App\Symfony\Component\Controller\Contact\Request;
use App\Symfony\Component\Controller\Contact\Form;
use App\Entity\Contact;
use App\Form\ContactType;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

        }

        return $this->render('contact/index.html.twig', [
            'form' => $form,
        ]);
    }
}
