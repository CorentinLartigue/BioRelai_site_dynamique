<?php

class Utilisateurs{
    private array $utilisateurs ;

    public function __construct($array){
        if (is_array($array)) {
            $this->utilisateurs = $array;
        }
    }

    public function getUtilisateurs(){
        return $this->utilisateurs;
    }



    public function chercheUtilisateurs($unIdUtilisateur){
        foreach ($this->utilisateurs as $utilisateur) {
            if ($utilisateur->getIdUtilisateur() === $unIdUtilisateur) {
                return $utilisateur;
            }
        }
        return null; // Aucun utilisateur trouvé
    }

}