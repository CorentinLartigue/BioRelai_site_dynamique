<?php
class LigneCommandeDAO{
    public static function ajouter($idProduit,$quantite,$dateCommande,$idAdherent){

        $requetePrepa1 = DBConnex::getInstance()->prepare("insert into commandes (dateCommande,idAdherent) VALUES (:dateCommande,:idAdherent)");
        $requetePrepa1->bindParam(':idAdherent', $idAdherent);
        $requetePrepa1->bindParam(':dateCommande', $dateCommande);
        $requetePrepa1->execute();
        $id=DBConnex::getInstance()->lastInsertId();



        $requetePrepa2 = DBConnex::getInstance()->prepare("insert into lignesCommande (idCommande,idProduit,quantite) VALUES (:idCommande,:idProduit,:quantite)");
        $requetePrepa2->bindParam(':idCommande', $id);
        $requetePrepa2->bindParam(':idProduit', $idProduit);
        $requetePrepa2->bindParam(':quantite', $quantite);
        $requetePrepa2->execute();

    }
    
    public static function modifier($idCommande,$quantite){
        $requetePrepa = DBConnex::getInstance()->prepare("update lignesCommande SET quantite=:quantite WHERE idCommande=:idCommande ;");
        $requetePrepa -> bindParam(':idCommande', $idCommande);
        $requetePrepa -> bindParam(':quantite', $quantite);
        return $requetePrepa -> execute();
    }
}
