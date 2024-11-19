<?php

class Producteurs{
    private array $producteurs ;

    public function __construct($array){
        if (is_array($array)) {
            $this->producteurs = $array;
        }
    }

    public function getProducteurs(){
        return $this->producteurs;
    }


    public function chercheProducteurs($unIdProducteur){
        foreach ($this->producteurs as $producteur) {
            if ($producteur->getIdProducteur() === $unIdProducteur) {
                return $producteur;
            }
        }
        return null; // Aucun utilisateur trouvé
    }

}