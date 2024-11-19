<?php
class ProduitDAO{
    public static function lesProduits(){
        $result = [];
        $requetePrepa = DBConnex::getInstance()->prepare("select produits.* from produits,proposer where produits.idProduit=proposer.idProduit ");
        $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($liste)){
            foreach($liste as $produit){
                $unProduit = new Produit(null,null,null,null,null,null);
                $unProduit->hydrate($produit);
                $result[] = $unProduit;
            }
        }
        return $result;
    }
}
