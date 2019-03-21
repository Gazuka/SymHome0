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
        $speech = "coucou jerome merci";
        //Répondre au Google Home
	    $response = new \stdClass();
	    $response->fulfillmentText = $speech;
	    //$response->displayText = $speech;
	    //$response->source = "webhook";
        $home = json_encode($response);
        return new Response($home);
        //return $this->render('home/index.html.twig');
    }
}
