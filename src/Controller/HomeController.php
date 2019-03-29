<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    private $Json;
    private $Action;
    private $Speech = "Désolé je ne sais quoi répondre...";

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
        $this->Speech = $this->fulfillmentTransformAction();
        
        return $this->fulfillmentRepondre();        
    }

    private function manger() {
        $age = $this->fulfillmentRecupContext('patate', 'age');
        return "Je mange ". $age;
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
    private function fulfillmentAction()
    {
        
    }

    private function fulfillmentTransformAction()
    {
        switch($this->Action)
        {
            case 'manger':
                return $this->manger();
            break;
        }
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

    private function fulfillmentRepondre()
    {
        //Répondre au Google Home
        $response = new \stdClass();
        $response->fulfillmentText = $this->Speech;
        $home = json_encode($response);
        return new Response($home);
    }
}
