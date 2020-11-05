<?php
namespace App\Controller;

use App\Entity\ArticleCommande;
use App\Entity\Articles;
use App\Entity\Client;
use App\Entity\Commande;
use App\Repository\ArticleCommandeRepository;
use App\Repository\ArticlesRepository;
use App\Repository\ClientRepository;
use App\Repository\CommandeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CommandeController extends AbstractController
{
    /**
     * @Route("/commander/{total}",name="commande.commanderPanier")
     * @return Response
     */

    public function commanderPanier(SessionInterface $session, $total,ArticleCommandeRepository $commandeRepository,
                                    ArticlesRepository $articlesRepository,EntityManagerInterface $entityManager,
                                    ClientRepository$clientRepository): Response
    {


        $articlesCommandes = $commandeRepository->findAll();
        $panier = $session->get('panier', []);

        $cmd = new  Commande();
        if ($articlesCommandes) {

            foreach ($articlesCommandes as $item) {
                $id = $item->getArticle()->getId();

                $cmd->setArticles($id, $item->getQuantity(), $articlesRepository);

                if (!empty($panier[$id])) {
                    unset($panier[$id]);
                }

                $session->set('panier', $panier);
                $entityManager->remove($item);
                $entityManager->flush();
            }
            $client = $clientRepository->find($this->getUser()->getId());
            $cmd->setClient($client);
            $cmd->setTotal($total);


            $entityManager->persist($cmd);
            $entityManager->flush();
        }


        return $this->redirectToRoute('commande.commandes');
    }

    /**
     * @Route("/commandes",name="commande.commandes")
     * @return Response
     */

    public function commandes(CommandeRepository $repository): Response
    {
        if ($this->getUser() != null and $this->getUser()->getUsername() == 'admin') {
            return $this->redirectToRoute('Home.index');
        } else {
            $commandes = $repository->findBy(array("client" => $this->getUser()->getId()));
            return $this->render('panier/commande.html.twig', array(
                'commande' => $commandes,
                'current_menu' => 'commande',
            ));
        }
    }
}

?>

