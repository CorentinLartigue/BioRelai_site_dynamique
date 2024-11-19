<?php

class Produits{
    private array $produits ;

    public function __construct($array){
        if (is_array($array)) {
            $this->produits = $array;
        }
    }

    public function getProduits(){
        return $this->produits;
    }


    public function chercheProduits($unIdProduit){
        foreach ($this->produits as $produit) {
            if ($produit->getIdProduit() === $unIdProduit) {
                return $produit;
            }
        }
        return null; // Aucun utilisateur trouvé
    }

}