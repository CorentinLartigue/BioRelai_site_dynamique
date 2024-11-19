<?php

$_SESSION['listeProducteurs'] = new Producteurs(ProducteurDAO::lesProducteurs());




if(isset($_GET['producteur'])){
    $_SESSION['producteur']= $_GET['producteur'];

}
else
{
    if(!isset($_SESSION['producteur'])){
        $_SESSION['producteur']="0";
    }
}



$menuProducteur = new Menu("menuProducteur");


foreach ($_SESSION['listeProducteurs']->getProducteurs() as $unProducteur){
    $menuProducteur->ajouterComposant($menuProducteur->creerItemLien($unProducteur->getIdProducteur(),ProducteurDAO::getInfosProducteur($unProducteur->getIdProducteur())[1]));
}


$leMenuProducteur=$menuProducteur->creerMenuProducteur($_SESSION['producteur']);

$_SESSION['idActif'] =$_SESSION['producteur'];

foreach ($_SESSION['listeProducteurs']->getProducteurs() as $unProducteur){
    if ($unProducteur->getIdProducteur()==$_SESSION['idActif']){
        $_SESSION['producteurActif']=$unProducteur;
    }
}

$formProducteur= new Formulaire("post","index.php","formProducteur","formProducteur");

if($_SESSION['producteur']!=0){
    $formProducteur->ajouterComposantLigne($formProducteur->creerLabel("Nom: " , "labelProducteur") , 1 );
    $formProducteur->ajouterComposantLigne($formProducteur->creerInputTexte("nomProducteur", "nomProducteur", ProducteurDAO::getInfosProducteur($_SESSION['idActif'])[0] , "1" , "", "1") , 1 );
    $formProducteur->ajouterComposantTab();
    $formProducteur->ajouterComposantLigne($formProducteur->creerLabel("Prenom: " , "labelPrenom") , 1 );
    $formProducteur->ajouterComposantLigne($formProducteur->creerInputTexte("prenomProducteur", "prenomProducteur", ProducteurDAO::getInfosProducteur($_SESSION['idActif'])[1]  , "1" , "", "1") , 1 );
    $formProducteur->ajouterComposantTab();
    $formProducteur->ajouterComposantLigne($formProducteur->creerLabel("Mail: " , "labelMail") , 1 );
    $formProducteur->ajouterComposantLigne($formProducteur->creerInputTexte("mailProducteur", "mailProducteur", ProducteurDAO::getInfosProducteur($_SESSION['idActif'])[2] , "1" , "", "1") , 1 );
    $formProducteur->ajouterComposantTab();
    $formProducteur->ajouterComposantLigne($formProducteur->creerLabel("Adresse: " , "labelAdresseProducteur") , 1 );
    $formProducteur->ajouterComposantLigne($formProducteur->creerInputTexte("adresseProducteur", "adresseProducteur",$_SESSION['producteurActif']->getAdresseProducteur() , "1" , "", "1") , 1 );
    $formProducteur->ajouterComposantTab();
    $formProducteur->ajouterComposantLigne($formProducteur->creerLabel("Commune: " , "labelCommuneProducteur") , 1 );
    $formProducteur->ajouterComposantLigne($formProducteur->creerInputTexte("communeProducteur", "communeProducteur", $_SESSION['producteurActif'] ->getCommuneProducteur () , "1" , "", "1") , 1 );
    $formProducteur->ajouterComposantTab();
    $formProducteur->ajouterComposantLigne($formProducteur->creerLabel("Descriptif: " , "labelDescriptif") , 1 );
    $formProducteur->ajouterComposantLigne($formProducteur->creerInputTexte("descriptifProducteur", "descriptifProducteur", $_SESSION['producteurActif'] ->getDescriptifProducteur() , "1" , "", "1") , 1 );
    $formProducteur->ajouterComposantTab();
}
else{
    $formProducteur->ajouterComposantLigne($formProducteur->creerLabel("Veuiller selectioner un producteur! ", "labelProducteur"),1);
    $formProducteur->ajouterComposantTab();
   
}
$formProducteur->creerFormulaire();

require_once 'vues/visiteurs/vueVisiteurs.php' ;

