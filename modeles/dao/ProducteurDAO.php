<?php
class ProducteurDAO{

    public static function lesProducteurs(){
        $result = [];
        $requetePrepa = DBConnex::getInstance()->prepare("select * from producteurs ");
        $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($liste)){
            foreach($liste as $producteur){
                $unProducteur = new Producteur(null,null,null,null,null,null);
                $unProducteur->hydrate($producteur);
                $result[] = $unProducteur;
            }
        }
        return $result;
    }

    public static function getInfosProducteur($idUtilisateur) {


        $requetePrepa = DBConnex::getInstance()->prepare("select nomUtilisateur,prenomUtilisateur, mail from utilisateurs where idUtilisateur = :idUtilisateur");
        $requetePrepa->bindParam(":idUtilisateur", $idUtilisateur);
        $requetePrepa->execute();
        $result = $requetePrepa->fetch();
        return $result;
    }

    public static function getProducteurById($idProducteur) {


        $requetePrepa = DBConnex::getInstance()->prepare("select * from producteurs where idProducteur = :idProducteur");
        $requetePrepa->bindParam(":idProducteur", $idProducteur);
        $requetePrepa->execute();
        $result = $requetePrepa->fetch();
        return $result;
    }
}