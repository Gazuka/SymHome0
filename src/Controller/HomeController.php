<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    private $Json;
    private $Action;
    private $Speech;

    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'POST'){$fichier = 'php://input';}else{$fichier = 'test.json';}//fichier reel ou fichier fictif pour dev

        //Récupération du fichier Json
        $this->fulfillment($fichier);
        //Appel de la fonction demandé
        //$this->Speech = $this->fulfillmentTransformAction();
        return $this->fulfillmentTransformAction();
        //return $this->fulfillmentRepondre();       
    }
    
    private function fulfillmentTransformAction()
    {
        //Tableau de variables à passer dans l'url
        $variables = ['format' => "home"];
        
        //On ajoute des variables selon la page de redirection
        switch($this->Action)
        {
            case 'liste_boites':                
                //$age = $this->fulfillmentRecupContext('patate', 'age');      
            break;
            case 'liste_typealiment':
                //Affiche la liste des type d'aliment
            break;
            default :
                $this->Action = 'liste_boites'; //Remplacer par page d'erreur    
                $variables = ['format' => "web"];
            break;
        }
        
        //On effectue une redirection vers la bonne page avec les variables requises
        return $this->redirectToRoute($this->Action, $variables);
    }

    /**
     * Permet de récupérer le Json d'un Fulfillment DialogFlow
     */
    private function fulfillment($fichier)
    {
        //Récuperation du json
        $requestBody = file_get_contents($fichier);
        $json = json_decode($requestBody);
        $this->Json = $json;

        //Récupération de la variable Action dans le json
        $this->Action = $this->Json->queryResult->action;
    }

    private function fulfillmentRecupContext($context, $variable)
    {
        foreach($this->Json->queryResult->outputContexts as $param)   
        {
            $tab = explode("/", $param->name);
            $ContextName = $tab[count($tab)-1];
            if($context == $ContextName)
            {
                return $param->parameters->$variable;
            }            
        } 
    }

    /*private function fulfillmentRepondre()
    {
        //Répondre au Google Home
        $response = new \stdClass();
        $response->fulfillmentText = htmlentities($this->Speech);
        $home = json_encode($response);
        return new Response($home);
    }*/
}
