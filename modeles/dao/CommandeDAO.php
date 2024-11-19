<?php
class CommandeDAO{

    public static function validerCommande($idCommande,$dateCommande,$statutCo)
    {
        $requetePrepa1 = DBConnex::getInstance()->prepare("select idVentes from ventes where dateDebutCli<:dateCommande>dateFinCli");
        $requetePrepa1->bindParam(':dateCommande', $dateCommande);
        $id=$requetePrepa1->execute();

        $requetePrepa2 = DBConnex::getInstance()->prepare("UPDATE commandes SET dateCommande=:dateCommande,statutCo=:statutCo ,idVente=:idVente WHERE idCommande=:idCommande");

        $requetePrepa2->bindParam(':idCommande', $idCommande);
        $requetePrepa2->bindParam(':dateCommande', $dateCommande);
        $requetePrepa2->bindParam(':statutCo', $statutCo);
        $requetePrepa2->bindParam(':idVente', $id);
        $requetePrepa2->execute();
    }

    public static function supprimerCommande($idCommande)
    {
        $requetePrepa = DBConnex::getInstance()->prepare("delete from lignesCommande where idCommande = :idCommande");
        $requetePrepa->bindParam(':idCommande', $idCommande);
        $requetePrepa->execute();

        $requetePrepa = DBConnex::getInstance()->prepare("delete from commandes where idCommande = :idCommande");
        $requetePrepa->bindParam(':idCommande', $idCommande);
        $requetePrepa->execute();
    }

    public static function getInfosProduit($idCommande) {
        $requetePrepa1 = DBConnex::getInstance()->prepare("select idProduit from lignesCommande where idCommande = :idCommande");
        $requetePrepa1->bindParam(":idCommande", $idCommande);
        $idProduit=$requetePrepa1->execute();

        $requetePrepa2 = DBConnex::getInstance()->prepare("select nomProduit,quantite from lignesCommande,produits where idCommande = :idCommande and produits.idProduit=:idProduit");
        $requetePrepa2->bindParam(":idCommande", $idCommande);
        $requetePrepa2->bindParam(":idProduit", $idProduit);
        $requetePrepa2->execute();
        $result = $requetePrepa2->fetch();
        return $result;
    }

    public static function lesCommandes($idAdherent,$statutCo){
        $result = [];
        $requetePrepa = DBConnex::getInstance()->prepare("select * from commandes where idAdherent=:idAdherent and statutCo=:statutCo");
        $requetePrepa->bindParam(':idAdherent', $idAdherent);
        $requetePrepa->bindParam(':statutCo', $statutCo);
        $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($liste)){
            foreach($liste as $commande){
                $uneCommande = new Commande(null,null,null,null,null);
                $uneCommande->hydrate($commande);
                $result[] = $uneCommande;
            }
        }
        return $result;
    }

}