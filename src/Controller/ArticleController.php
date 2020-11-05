<?php
namespace App\Controller;
use App\Entity\Articles;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ArticleController extends AbstractController {



    /**
     * @Route("/articles/{slug}-{id}",name="article.show", requirements={"slug": "[a-z0-9\-]*"})
     * @param Articles $article
     * @param string $slug
     * @return Response
     */

    public function show (Articles $article, string $slug): Response {
        if ($article->getSlug() !== $slug){
            return $this->redirectToRoute('article.show',[
                'id' => $article->getId(),
                'slug' => $article->getSlug()
            ], 301);
        }
        return $this->render('page/affichageProduit.html.twig',array('article' => $article));

    }



}