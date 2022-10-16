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
 *
 * CODE DU CONTROLLER SHOW() MODIFIÉ:
 * il n'affiche plus de html, ms il est maintenant
 * associé à son template qui contient le html
 * template a template/event/show.html.twig
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
		return $this->render('event/show.html.twig', ['event_id'=> $id]);
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
