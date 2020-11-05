<?php

namespace App\Controller;

use App\Entity\ArticleCommande;
use App\Entity\Client;
use App\Repository\ArticleCommandeRepository;
use App\Repository\ArticlesRepository;
use App\Form\Client2Type;

use App\Repository\ClientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class PanierController extends AbstractController
{


    /**
     * @Route("/panier",name="panier")
     */
    public function panier(SessionInterface $session, ArticlesRepository $articleRepository,
                           EntityManagerInterface $entityManager)
    {

        if ($this->getUser() != null and $this->getUser()->getUsername() == 'admin') {
            return $this->redirectToRoute('Home.index');
        } else {
            $panier = $session->get('panier', []);
            $panierWithData = [];

            foreach ($panier as $id => $quantite) {

                $panierWithData[] = [
                    'article' => $articleRepository->find($id),
                    'quantite' => $quantite
                ];
            }

            $total = 0;
            foreach ($panierWithData as $item) {
                $totalItem = $item['article']->getPrix() * $item['quantite'];
                $total += $totalItem;
            }

            if ($this->getUser()) {


                $client = $this->getDoctrine()->getRepository(Client::class)->find($this->getUser()->getId());
                foreach ($panier as $id => $quantite) {
                    $articleExistant = $this->getDoctrine()
                        ->getRepository(ArticleCommande::class)
                        ->findOneBy(array('client' => $client->getId(), 'article' => $id));

                    if ($articleExistant) {
                        if ($articleExistant->getQuantity() != $quantite) {
                            $articleExistant->setQuantity($quantite);
                            $entityManager->persist($articleExistant);
                            $entityManager->flush();
                        }
                    } else {
                        $articleCommande = new ArticleCommande();
                        $articleCommande->setQuantity($quantite);
                        $articleCommande->setArticle($articleRepository->find($id));
                        $articleCommande->setClient($client);
                        $entityManager->persist($articleCommande);
                        $entityManager->flush();
                    }

                }
                $articlesCommandes = $entityManager->getRepository(ArticleCommande::class)->findAll();
                $panierWithData = [];
                foreach ($articlesCommandes as $items) {
                    if ($items->getClient()->getId() == $this->getUser()->getId()) {
                        $panierWithData[] = [
                            'article' => $articleRepository->find($items->getArticle()->getId()),
                            'quantite' => $items->getQuantity()
                        ];
                    }

                }
                $total = 0;
                foreach ($panierWithData as $item) {
                    $totalItem = $item['article']->getPrix() * $item['quantite'];
                    $total += $totalItem;
                }

            }
            return $this->render('panier/pagePanier.html.twig', [
                'items' => $panierWithData,
                'total' => $total,
                'current_menu' => 'panier'
            ]);

        }

    }

    /**
     * @Route(" /livraison/{id}-{total}",name="panier.livraison")
     */
    public function livraison(Client $client, ArticlesRepository $articleRepository, $total, ArticleCommandeRepository $repository): Response
    {
        if ($this->getUser() != null and $this->getUser()->getUsername() == 'admin') {
            return $this->redirectToRoute('Home.index');
        } else {
            $articlesCommandes = $repository->findAll();

            return $this->render("panier/pageConfirmation.html.twig", array(
                    'client' => $client,
                    'items' => $articlesCommandes,
                    'total' => $total+10,
                )
            );
        }
    }

    /**
     * @Route("/valider/{id}",name="panier.valider")
     * @return Response
     */
    public function valider(Client $client, Request $request, EntityManagerInterface $entityManager): Response
    {

        $form = $this->createForm(Client2Type::class, $client);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            // 4) save the Client!
            $entityManager->flush();
            return $this->redirectToRoute('panier.livraison', [
                    'id' => $client->getId(),
                    'total' => $_GET['total']]
            );

        }

        return $this->render('panier/validationCoordonnée.html.twig', [
            'form' => $form->createView(),

        ]);

    }

    /**
     * @Route("/ajouter/{id}",name="panier.ajouterArticle")
     */
    public function ajouterArticle($id, SessionInterface $session)
    {
        $panier = $session->get('panier', []);
        $quantite = $_POST['quantite'];

        if (!empty($panier[$id])) {
            $panier[$id] += $quantite;
        } else {
            $panier[$id] = $quantite;
        }

        $session->set('panier', $panier);

        return $this->redirectToRoute('panier');
    }

    /**
     * @Route("/supprimerBase/{id}",name="panier.supprimerBase")
     * @param $id
     * @return Response
     */
    public function supprimerBase($id, SessionInterface $session, ArticleCommandeRepository $repository, EntityManagerInterface $entityManager): Response
    {
        $panier = $session->get('panier', []);

        if (!empty($panier[$id])) {
            unset($panier[$id]);
        }

        $session->set('panier', $panier);

        $articleCommande = $repository->findOneBy(array('article' => $id));

        //delete article from base
        $entityManager->remove($articleCommande);
        $entityManager->flush();

        //add success flush to confirm the delete
        $this->addFlash('success', 'Article supprimé avec succés');
        return $this->redirectToRoute('panier');

    }


    /**
     * @Route("/supprimer/{id}",name="panier.supprimer")
     * @param $id
     * @return Response
     */
    public function supprimer($id, SessionInterface $session): Response
    {
        $panier = $session->get('panier', []);
        if (!empty($panier[$id])) {
            unset($panier[$id]);
        }

        $session->set('panier', $panier);
        return $this->redirectToRoute('panier');

    }


}

?>