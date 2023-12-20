<?php
class UtilisateurDAO{


    public static function verification($unMail,$unMdp){
        
        $requetePrepa = DBConnex::getInstance()->prepare("select * from utilisateurs where mail = :mail and  mdp = :mdp");
        $requetePrepa->bindParam( ":mail", $unMail);
        $requetePrepa->bindParam( ":mdp" ,  $unMdp);

        $requetePrepa->execute();

        $result = $requetePrepa->fetch();
        return $result;
    }

    public static function inscription($mail,$mdp,$statut,$nomUtilisateur,$prenomUtilisateur){
        $requetePrepa2 = DBConnex::getInstance()->prepare("insert into utilisateurs (mail,mdp,statut,nomUtilisateur,prenomUtilisateur) VALUES (:mail,:mdp,:statut,:nomUtilisateur,:prenomUtilisateur)");
        $requetePrepa2->bindParam(':mail', $mail);
        $requetePrepa2->bindParam(':mdp', $mdp);
        $requetePrepa2->bindParam(':statut', $statut);
        $requetePrepa2->bindParam(':nomUtilisateur', $nomUtilisateur);
        $requetePrepa2->bindParam(':prenomUtilisateur', $prenomUtilisateur);
        $requetePrepa2->execute();
        $id=DBConnex::getInstance()->lastInsertId();

        $requetePrepa1 = DBConnex::getInstance()->prepare("insert into adherents (idAdherent) VALUES (:idAdherent)");
        $requetePrepa1->bindParam(':idAdherent', $id);
        $requetePrepa1->execute();


    }


    public static function getUtilisateurById($idUtilisateur) {


        $requetePrepa = DBConnex::getInstance()->prepare("select * from utilisateurs where idUtilisateur = :idUtilisateur");
        $requetePrepa->bindParam(":idUtilisateur", $idUtilisateur);
        $requetePrepa->execute();
        $result = $requetePrepa->fetch();
        return $result;
    }

    public static function supprimer($idUtilisateur) {
        $requetePrepa = DBConnex::getInstance()->prepare("delete from utilisateurs WHERE idUtilisateur = :idUtilisateur");
        $requetePrepa->bindParam(":idUtilisateur", $idUtilisateur);
        $requetePrepa->execute();

        $requetePrepa = DBConnex::getInstance()->prepare("delete from adherents WHERE idAdherent = :idAdherent");
        $requetePrepa->bindParam(":idAdherent", $idUtilisateur);
        $requetePrepa->execute();
    }

    public static function modifier($idUtilisateur,$mail,$mdp,$nomUtilisateur,$prenomUtilisateur){
        $requetePrepa = DBConnex::getInstance()->prepare("update utilisateurs SET mail=:mail,mdp=:mdp ,nomUtilisateur=:nomUtilisateur,prenomUtilisateur=:prenomUtilisateur WHERE idUtilisateur=:idUtilisateur;");
        $requetePrepa -> bindParam(':idUtilisateur', $idUtilisateur);
        $requetePrepa -> bindParam(':mail', $mail);
        $requetePrepa -> bindParam(':mdp',$mdp);
        $requetePrepa -> bindParam(':nomUtilisateur',$nomUtilisateur);
        $requetePrepa -> bindParam(':prenomUtilisateur',$prenomUtilisateur);
        return $requetePrepa -> execute();
    }

    
}