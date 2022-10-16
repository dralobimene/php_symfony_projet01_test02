<?php

// src/Controller/CoreController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CoreController extends AbstractController {
    
    // definit° de la route (syntaxe eclipse)
    #[Route('/', name: 'index ou homepage')]
    
    // -----------------------------------------------
    // il y a 1 autre syntaxe pr definir des routes
    // s'ecrit cô 1 commentaire multiligne
    
    //  /**
    //   * @Route("/", name = "index ou homepage")
    //  */
    //------------------------------------------------
    
    // la route aisni définie est une adresse web
    // ici
    // https://localhost:8000
    
    // methode index qui retourne un objet de type Response
    // c'est 1 controller
	public function index(): Response {

		// Nouveau code pr faire le lien avec le fichier
		// vue du dossier templates/core/index.html.twig
		// affiche le texte entré ds le template
		// twig,
		// ici, un texte en dur, rien de dynamique
		return $this -> render('core/index.html.twig');
	}
    
    // c'est aussi 1 controller
    // NOTE:
    // fonctionne sans definition de Route???
    // peut etre car ce st des Route statiques
	public function about() {
        return new Response("
            Voici la Response about pr la page
            <br>
            adresse: localhost:8000/about
            <br>
            c'est la methode (ou controller)
            <br>
            methode: about()
            <br>
            fichier: projet_test01/src/Controller/CoreController.php
            <br>
            ");
    }
}
