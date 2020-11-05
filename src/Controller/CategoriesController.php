<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Repository\ArticlesRepository;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CategoriesController extends AbstractController

{

    /**
     * @Route("/sucré",name="categories.sucre")
     * @return Response
     */
    function sucre(ArticlesRepository $repository): Response
    {


        $pattrad = $repository->findBy(array("categorie" => "Pâtisserie traditionnelle"));
        $gat = $repository->findBy(array("categorie" => "Gâteau"));
        $petitgat = $repository->findBy(array("categorie" => "Petit gâteau"));
        $coff = $repository->findBy(array("categorie" => "Coffret"));

        return $this->render('page/produitSucré.html.twig', array(
            "article1" => $pattrad,
            "article2" => $gat,
            "article3" => $petitgat,
            "article4" => $coff,
            'current_menu' => 'categorie'));
    }

    /**
     * @Route("/salé",name="categories.sale")
     * @return Response
     */
    function sale(ArticlesRepository $repository): Response
    {

        $btrad = $repository->findBy(array("categorie" => "Bouchée traditionnelle"));
        $bc = $repository->findBy(array("categorie" => "Bouchée chaude"));
        $bf = $repository->findBy(array("categorie" => "Bouchée froide"));
        $b = $repository->findBy(array("categorie" => "Brochette"));
        return $this->render('page/produitSalé.html.twig', array(
            "article1" => $btrad,
            "article2" => $bf,
            "article3" => $bc,
            "article4" => $b,
            'current_menu' => 'categorie'));
    }


}

?>