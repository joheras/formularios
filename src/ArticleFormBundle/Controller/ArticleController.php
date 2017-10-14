<?php

namespace ArticleFormBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ArticleFormBundle\Model\Article;
use ArticleFormBundle\Form\ArticleType;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends Controller
{
    public function publishAction(Request $peticion) {
        // Creamos el formulario
        $article = Article::draft("El Quijote", "En un lugar de la mancha...");
        $form = $this -> createForm(ArticleType::class,$article);

        // Gestionamos la petición
        $form->handleRequest($peticion);
        // Comprobamos si el formulario es válido
        if ($form->isValid()) {
            return $this->render("ArticleFormBundle:Article:summary.html.twig", array('article'=> $article));
        }
        // Mostramos el formulario vacío
        return $this->render("ArticleFormBundle:Article:status.html.twig",
                array('formulario' => $form->createView(),'article'=>$article));
    }
}
