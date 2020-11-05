<?php

namespace App\Controller;

use App\Form\ClientType;
use App\Repository\ClientRepository;
use App\Services\Mailer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Client;

class SecurityController extends AbstractController
{


    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request, AuthenticationUtils $authenticationUtils, SessionInterface $session)
    {
        if (!$session->get('etat')) {

            $etat = $_GET['previous'] ?? null;
            $session->set('etat', $etat);
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        if ($error) {
            $error = "nom d'utilisateur ou (et) mot de passe invalide(s) ";
        }

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('Security/connexion.html.twig', array(
            'last_username' => $lastUsername,
            'error' => $error,
            'current_menu' => 'connexion',

        ));

    }

    /**
     * @Route("/login/motDePasseOublie", name="motDePasseOublie")
     */
    public function motDePasseOublie()
    {
        return $this->render('Security/confirmationEmail.html.twig');
    }

    /**
     * @Route("/login/reinitialisationMDP", name="reinitialisationMDP")
     * @param \Swift_Mailer $mailer
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */

    public function reinitialisationMDP(Mailer $mailer, ClientRepository $repository)
    {


        $email = $_POST['email'];
        $client = $repository->findOneBy(array('adresse_email' => $email));

        if ($client) {
            $mailer->sendMail($client->getAdresseEmail(),
                'Email/emailMDP.html.twig',
                'réinitialiser le mot de passe', $client);

            return $this->redirectToRoute('Home.index');
        }
        $this->addFlash('error', "Adresse email inexistante ,
                                       indiquer l'adresse email que vous nous avez communiqué lors de votre inscription .");

        return $this->redirectToRoute('motDePasseOublie');

    }

    /**
     * @Route("/changerMDP",name="changerMDP")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function changerMDP()
    {
        return $this->render('Security/modifierMDP.html.twig', array(
            'email' => $_GET['email']
        ));
    }

    /**
     * @Route("/modifierMDP",name="modifierMDP")
     */

    public function modifierMDP(Request $request, UserPasswordEncoderInterface $passwordEncoder,
                                EntityManagerInterface $entityManager, ClientRepository $repository)
    {


        $client = $repository->findOneBy(array('adresse_email' => $_GET['email']));
        if ($_POST['password'] == $_POST['confpassword']) {

            $password = $passwordEncoder->encodePassword($client, $_POST['password']);
            $client->setPassword($password);
            $entityManager->persist($client);
            $entityManager->flush();
            $this->addFlash('success', 'mot de passe modifié avec succé');

            return $this->redirectToRoute('login');
        }

        $this->addFlash('error', 'mot de passe incorrect');

        return $this->redirectToRoute('changerMDP', array(
            'email' => $_GET['email']
        ));
    }

}