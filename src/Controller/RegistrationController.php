<?php
// src/Controller/RegistrationController.php
namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager)
    {

        $client = new Client();

        // 1) build the form
        $form = $this->createForm(ClientType::class, $client);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($client, $client->getPlainPassword());
            $client->setPassword($password);

            // 4) save the Client!
            $entityManager->persist($client);
            $entityManager->flush();

            //  set a "flash" success message for the user
            $this->addFlash('success', 'Compte crée avec succés');

            return $this->redirectToRoute('login');
        }

        return $this->render(
            'registration/creationCompte.html.twig',
            array('form' => $form->createView(), 'current_menu' => 'register')
        );
    }
}