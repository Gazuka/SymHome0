<?php

namespace App\Service;

use App\Entity\TypeAliment;

class Fulfillment {
    private $Json;
    public $Action;

    public function index()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'POST'){$fichier = 'php://input';}else{$fichier = 'test.json';}//fichier reel ou fichier fictif pour dev

        //Récupération du fichier Json
        $this->fulfillment($fichier);
        //Appel de la fonction demandé
        //return $this->fulfillmentTransformAction();
        //return $this->fulfillmentRepondre(); 
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

    /**
     * On récupére une variable du ContextOutput de Dialogflow
     *
     * @return void
     */
    public function fulfillmentRecupContext($context, $variable)
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
  
    /**
     * On récupére une variable parametre de Dialogflow
     *
     * @return void
     */
    public function fulfillmentRecupParam($variable)
    {
        return $this->Json->queryResult->parameters->$variable;
    }
}