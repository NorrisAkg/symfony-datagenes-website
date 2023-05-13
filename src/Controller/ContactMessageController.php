<?php

namespace App\Controller;

use App\Entity\ContactMessage;
use App\Form\ContactMessageType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactMessageController extends AbstractController
{
    #[Route('/contact', name: 'app_contact_message')]
    public function index(Request $request): Response
    {
        $message = new ContactMessage();
        $contactForm = $this->createForm(ContactMessageType::class, $message);

        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            dd($request->request->all());
        }
        return $this->render('contact_message/index.html.twig', [
            'contactForm' => $contactForm->createView()
        ]);
    }
}
