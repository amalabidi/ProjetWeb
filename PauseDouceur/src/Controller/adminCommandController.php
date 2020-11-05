<?php


namespace App\Controller;

use App\Repository\CommandeRepository;
use App\Services\Paginator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class adminCommandController extends AbstractController
{
    /**
     * @return Response
     * @Route("/admin/commande", name="admin.commande.index")
     */

    public function index(CommandeRepository $repository,Paginator $paginator,Request $request): Response
    {
        $page = $request->query->get('page') ?? 1;
        $nbEnregistrements = $repository->count(array());
        $commandes = $repository->findBy([], array('id' => 'DESC'), 3, ($page - 1) * 3);

        return $this->render('admin/commande/gestionCommandes.html.twig', [
            'current_menu'=>'GererCommande',
            'commandes' => $commandes,
            'nbPage' => $paginator->paginate($nbEnregistrements,3),
        ]);

    }

    /**
     * @return Response
     * @Route("/admin/livrerCommande", name="admin.livrerCommande")
     */

    public function livrer(EntityManagerInterface $entityManager,CommandeRepository $repository): Response
    {

        $cmd = $repository->findOneBy(array('id'=>$_GET['id']));
        $cmd->setEtat('true');
        $entityManager->persist($cmd);
        $entityManager->flush();
        return $this->redirectToRoute('admin.commande.index');

    }


}