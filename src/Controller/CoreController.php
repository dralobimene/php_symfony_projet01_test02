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
        return new Response("
            Voici encore 1x la nvelle Response
            <br>
            ms avec du HTML
            <br>
            adresse: localhost:8000
            <br>
            c'est la methode (ou controller)
            <br>
            methodes: index()
            <br>
            fichier: projet_test01/src/Controller/CoreController.php
            <br>
            On peut taper differentes adresses ds la barre d'adresses
            <br>
            localhost:8000 (cette page)
            <br>
            https://localhost:8000/events
            <br>
            https://localhost:8000/1String
            <br>
            https://localhost:8000/events/1 (ou 2, ou 3, ou n'importe)
            <br>
            https://localhost:8000/
            <br>
            https://localhost:8000/pays/1String/ville/1String
            <br>
            https://localhost:8000/about
            ");
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
