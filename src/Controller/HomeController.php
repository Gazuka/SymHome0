<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        // Process only when method is POST
        $speech = "rien";
        
        if($method == 'POST')
        {
	        //Récuperation du json
	        $requestBody = file_get_contents('php://input');
            $json = json_decode($requestBody);
            //Récupération d'une variable dans le json
            $action = $json->queryResult->action;
            //$age = $json->outputContexts->parameters->age.original;
            $age = "5";
            
            $speech = $this->$action($age);
        }
        
        //$speech = "coucou jerome merci".$action;
        //Répondre au Google Home
	    $response = new \stdClass();
	    $response->fulfillmentText = $speech;
	    //$response->displayText = $speech;
	    //$response->source = "webhook";
        $home = json_encode($response);
        return new Response($home);
        //return $this->render('home/index.html.twig');
    }

    public function manger($age) {
        return "Je mange ". $age;
    }
}
