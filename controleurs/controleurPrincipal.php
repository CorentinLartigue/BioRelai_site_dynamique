<?php
$messageErreurConnex="";
date_default_timezone_set('Europe/Paris');
if(isset($_POST['submitInscript'])) {
    $inscription = UtilisateurDAO::inscription($_POST['mail'], $_POST['mdp'], "Client", $_POST['nomUtilisateur'], $_POST['prenomUtilisateur']);
    $_SESSION['inscription'] = $inscription;
    $_SESSION['menuPrincipalBioRelai'] = "visiteurs";
}

if(isset($_POST['submitConnex'])){

	$authentification=UtilisateurDAO::verification($_POST['mail'],$_POST['mdp']);
	if($authentification){
		$_SESSION['authentification']=$authentification;
        $_SESSION['menuPrincipalBioRelai']="visiteurs";
	}
	else{
		$messageErreurConnex="mail ou password inconnu";
	}
}
else{
	if(!isset($_SESSION['authentification'])){
		$_SESSION['authentification']=false;
        $_SESSION['menuPrincipalBioRelai']="visiteurs";
	}
}


if(isset($_GET['menuPrincipalBioRelai'])){
	$_SESSION['menuPrincipalBioRelai']= $_GET['menuPrincipalBioRelai'];
}
else
{
	if(!isset($_SESSION['menuPrincipalBioRelai'])){
		$_SESSION['menuPrincipalBioRelai']="visiteurs";
	}
}


//Menu CompteClient

if(isset($_POST["CompteModif"])) {
    $_SESSION['menuPrincipalBioRelai']="clientCompte";
}

if(isset($_POST['CompteSupprimer'])){
    UtilisateurDAO::supprimer($_SESSION['authentification'][0]);
    $_SESSION['authentification']=[];
    $_SESSION['menuPrincipalBioRelai']="visiteurs";
}

if(isset($_POST['CompteEnregistrerModif'])){
    $reponseSGBD=UtilisateurDAO::modifier($_SESSION['authentification'][0],$_POST["mail"],$_POST["mdp"],$_POST["nomUtilisateur"],$_POST["prenomUtilisateur"]);
    if ($reponseSGBD){
        $_SESSION['authentification']=UtilisateurDAO::getUtilisateurById($_SESSION['authentification'][0]);
        $_SESSION['menuPrincipalBioRelai']="clientCompte";
    }
}

if(isset($_POST['CompteAnnuler'])){
    $_SESSION['menuPrincipalBioRelai']="clientCompte";
}

//Menu panier

if(isset($_POST['ModifCommande'])){
    $_SESSION['menuPrincipalBioRelai']="clientPanier";
}

if(isset($_POST['EnregistrerModifCommande'])){
    LigneCommandeDAO::modifier( $_SESSION['idCommandeActif'],$_POST["quantite"]);
    $_SESSION['menuPrincipalBioRelai']="clientPanier";
}

if(isset($_POST['AnnulerModifCommande'])){
    $_SESSION['menuPrincipalBioRelai']="clientPanier";
}
//Menus principale


$menuPrincipalBioRelai = new Menu("menuPrincipalBioRelai");

if (!isset($_SESSION['authentification'])|| !$_SESSION['authentification']){
	$menuPrincipalBioRelai->ajouterComposant($menuPrincipalBioRelai->creerItemLien("visiteurs", "Accueil"));
	$menuPrincipalBioRelai->ajouterComposant($menuPrincipalBioRelai->creerItemLien("connexion", "Connexion"));
	$menuPrincipalBioRelai->ajouterComposant($menuPrincipalBioRelai->creerItemLien("inscription", "Inscription"));
}
else{
	$menuPrincipalBioRelai->ajouterComposant($menuPrincipalBioRelai->creerItemLien("visiteurs", "Accueil"));
	if($_SESSION['authentification']['statut']== 'Client' ){
		$menuPrincipalBioRelai->ajouterComposant($menuPrincipalBioRelai->creerItemLien("clientAchats", "Achats"));
		$menuPrincipalBioRelai->ajouterComposant($menuPrincipalBioRelai->creerItemLien("clientPanier",  "Panier"));
		$menuPrincipalBioRelai->ajouterComposant($menuPrincipalBioRelai->creerItemLien("clientFactures", "Factures"));
		$menuPrincipalBioRelai->ajouterComposant($menuPrincipalBioRelai->creerItemLien("clientCompte",  "Mon Compte"));

    }

	else if($_SESSION['authentification']['statut']== 'Producteur' ){
		$menuPrincipalBioRelai->ajouterComposant($menuPrincipalBioRelai->creerItemLien("ventesProducteur", "Ventes"));
		$menuPrincipalBioRelai->ajouterComposant($menuPrincipalBioRelai->creerItemLien("produitsProducteur",  "Produits"));
		$menuPrincipalBioRelai->ajouterComposant($menuPrincipalBioRelai->creerItemLien("producteurFactures",  "Factures"));
		$menuPrincipalBioRelai->ajouterComposant($menuPrincipalBioRelai->creerItemLien("producteurCompte",  "Mon Compte"));
	}

	else if($_SESSION['authentification']['statut']== 'Responsable' ){
		$menuPrincipalBioRelai->ajouterComposant($menuPrincipalBioRelai->creerItemLien("responsableVentes", "Ventes"));
		$menuPrincipalBioRelai->ajouterComposant($menuPrincipalBioRelai->creerItemLien("responsableProducteurs", "Producteurs"));
		$menuPrincipalBioRelai->ajouterComposant($menuPrincipalBioRelai->creerItemLien("responsableCategories",  "Catégories"));
		$menuPrincipalBioRelai->ajouterComposant($menuPrincipalBioRelai->creerItemLien("responsableFactures",  "Factures"));
		$menuPrincipalBioRelai->ajouterComposant($menuPrincipalBioRelai->creerItemLien("responsableCompte",  "Mon Compte"));
	}
	$menuPrincipalBioRelai->ajouterComposant($menuPrincipalBioRelai->creerItemLien("connexion", "Déconnexion"));

}
$menuPrincipalBioRelai = $menuPrincipalBioRelai->creerMenu($_SESSION['menuPrincipalBioRelai'],"menuPrincipalBioRelai");



include_once Dispatcher::dispatch($_SESSION['menuPrincipalBioRelai']);