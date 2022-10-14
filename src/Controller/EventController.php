<?php

// src/Controller/EventController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/*
 * PHPdoc de class: EventController
 * definit 2 controllers (methodes)
 * - show($id)
 * controller avec 1 parametre obligatoire de type int
 * - list($category = null)
 * controller avec 1 parametre facultatif de type String
 * 
 * on definit le controller show pr qu'il ne passe le barrage
 * que si son parametre est un int, sinon c'est le controller
 * list qui sera appelé (dc l'adresse passera ds ts les cas)
 * 
 * l'operat° se deroule dc ds la definition de la Route
 * du controller show(), qui prend un nvel attribut: requirements
 * qui definit 1 pattern REGEX pr le parametre id
 * 
 * La condit° par contre s'implemente ds le controller (methode)
 * list()
 * 
 * Ds ce cas-ci l'ordre des Controllers (methodes) est important.
 * le controller list() ne doit pas ê implémenté avt le 
 * controller show().
 * En effet, show() ne serait js appelé puisque list() n'a aucun
 * attribut requirements et la Route de list() passera qque soit
 * son type
 */
class EventController extends AbstractController {
    
    // definit° de la route (syntaxe eclipse)
    // syntaxe problematique
    // #[Route('/events/{id}', name: 'show_event', requirements={"id"="\d+"})]
    
    // -----------------------------------------------
    // il y a 1 autre syntaxe pr definir des Route
    // s'ecrit cô 1 commentaire multiligne
    
    /**
     * @Route("/events/{id}", name="show_event", requirements={"id"="\d+"})
     */
    //------------------------------------------------
    
    public function show($id): Response {
        return new Response("
            1 nvel objet de type Response ms qui prend 1 parametre
            <br>
            que pr le moment on tape directement ds la
            <br>
            barre d'adresse
            <br>
            tjs avec du HTML
            <br>
            adresse: localhost:8000/
            <br>
            Objectif:
            <br>
            Afficher 1 texte dynamique grace a 1 parametre ds la methode
            <br>
            show(\$id) ou list(\$category)
            <br>
            fichier: projet_test01/src/Controller/EventController.php
            <br>
            Resultat affiché:
            <br>
            Texte statique suivi du parametre \$id qui a comme valeur:
            {$id} (syntaxe qui necessite des {})
            <br>
            on est d'accord sur le fait que la valeur du parametre
            <br>
            est = à la valeur du parametre ds la barre d'adresse
            <br>
            (voir la def de la Route ds le fichier)
            <br>
            dc, en fait il suffit d'arriver DEPUIS 1 page qui definit
            <br>
            des parametres par les methodes GET, POST ou PUT.
            <br>
            A noter que la Route est definie ds ce fichier, il n'y a pas de
            <br>
            .yaml
            ");
    }
    
    /**
     * @Route("/events/{category}", name="list_events")
     */
    public function list($category = null): Response {
        
        $htmlMessage = "Liste des ventes:";
        $htmlMessage .= "<br>";
        
        if(!$category) {
                $htmlMessage .= "Categorie existe ms est null ou vide";
                $htmlMessage .= "<br>";
                $htmlMessage .= "ou n'existe pas.";
                $htmlMessage .= "<br>";
                $htmlMessage .= "je ne connais pas la difference pr le moment";
        } else {
            $htmlMessage .= "ds la categorie: {$category}.";
        }
        
        return new Response($htmlMessage);
        
    }
}
