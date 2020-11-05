<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Form\ArticlesType;
use App\Repository\ArticlesRepository;
use App\Services\Paginator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class adminArticleController extends AbstractController
{

    /**
     * @return Response
     * @Route("/admin", name="admin.article.index")
     */

    public function index(Request $request, ArticlesRepository $repository, Paginator $paginator): Response
    {

        $page = $request->query->get('page') ?? 1;


        $nbEnregistrements = $repository->count(array());
        $articles = $repository->findBy([], array('id' => 'DESC'), 10, ($page - 1) * 10);


        return $this->render('admin/article/index.html.twig', [
            'current_menu' => 'Gerer article',
            'articles' => $articles,
            'nbPage' => $paginator->paginate($nbEnregistrements, 10),

        ]);

    }


    /**
     * @param Articles $article
     * @param Request $request
     * @return Response
     * @Route("/admin/edit{id?0}", name="admin.article.edit", methods="GET|POST")
     */

    public function edit(Articles $article = null, Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($article == null) {
            $article = new Articles();
        }

        $form = $this->createForm(ArticlesType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($article);
            $entityManager->flush();

            $this->addFlash('success', 'Article edité avec succés');
            return $this->redirectToRoute('admin.article.index');
        }
        return $this->render('admin/article/edit.html.twig', [
            'current_menu' => 'Admin',
            'article' => $article,
            'form' => $form->createView()
        ]);
    }

    /**
     * @param Articles $article
     * @param Request $request
     * @return Response
     * @Route("/admin/Delete/{id}", name="admin.article.delete")
     */

    public function delete(Articles $article, Request $request, EntityManagerInterface $entityManager): Response
    {


        $entityManager->remove($article);
        $entityManager->flush();
        $this->addFlash('success', 'Article supprimé avec succés');

        return $this->redirectToRoute('admin.article.index');
    }

}

?>