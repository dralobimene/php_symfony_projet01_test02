<?php

// src/Controller/LieuxController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LieuxController extends AbstractController {
    
    // definit° de la route (syntaxe eclipse)
    // #[Route('/lieux', name: 'app_lieux')]
    
    // -----------------------------------------------
    // il y a 1 autre syntaxe pr definir des Route
    // s'ecrit cô 1 commentaire multiligne
    /**
     * @Route("/pays/{pays}/ville/{ville}", name="list_pays_ville")
     */
    // -----------------------------------------------
    
    //
    public function list_pays($pays = null, $ville = null): Response {
        
        $htmlMsg = "Liste des pays:";
        $htmlMsg .= "<br>";
        
        if($pays) {
            $htmlMsg .= "ds le pays: {$pays}.";
        }
        
        if($ville) {
            $htmlMsg .= "<br>";
            $htmlMsg .= "et la ville: {$ville}.";
        }
        
        return new Response($htmlMsg);
    }
}
