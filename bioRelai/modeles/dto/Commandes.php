<?php

class Commandes
{
    private array $commandes ;

    public function __construct($array){
        if (is_array($array)) {
            $this->commandes = $array;
        }
    }

    public function getCommandes(){
        return $this->commandes;
    }

    public function setCommandes($commandes) {
        $this->commandes = $commandes;
    }

}