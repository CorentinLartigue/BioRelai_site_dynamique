<?php

$formConnexion = new Formulaire("post","index.php","formuConnex","formuConnex");

if(!isset($_SESSION['authentification']) || !$_SESSION['authentification']){

    

    $formConnexion->ajouterComposantLigne($formConnexion->creerLabel("Mail: " , "labelMail") , 1 );
    $formConnexion->ajouterComposantLigne($formConnexion->creerInputTexte("mail", "mail","" , "1", "Entrez votre mail","0") , 1 );
    $formConnexion->ajouterComposantTab();

    $formConnexion->ajouterComposantLigne($formConnexion->creerLabel("Mdp: " , "labelMdp") , 1 );
    $formConnexion->ajouterComposantLigne($formConnexion->creerInputMdp('mdp', 'mdp', "", 1, 'Entrez votre mot de passe', "0",''),1);
    $formConnexion->ajouterComposantTab();

    $formConnexion->ajouterComposantLigne($formConnexion->creerInputSubmit("submitConnex", "submitConnex", "Valider"),1);
    $formConnexion->ajouterComposantLigne($formConnexion->creerLabel("$messageErreurConnex", "messageErreurConnexion"),1);
    $formConnexion->ajouterComposantTab();

    $formConnexion->creerFormulaire();


}

else{
    $_SESSION['authentification']=false;
    $_SESSION['menuPrincipalBioRelai']="visiteurs";
	header('location: index.php');
}
require_once 'vues/visiteurs/vueConnexion.php';
 
