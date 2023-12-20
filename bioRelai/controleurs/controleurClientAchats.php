<?php
$_SESSION['listeProduits'] = new Produits(ProduitDAO::lesProduits());

if (isset($_GET['produit'])) {
    $_SESSION['produit'] = $_GET['produit'];

} else {
    if (!isset($_SESSION['produit'])) {
        $_SESSION['produit'] = "0";
    }
}


$menuProduit = new Menu("menuProduit");


foreach ($_SESSION['listeProduits']->getProduits() as $unProduit) {
    $menuProduit->ajouterComposant($menuProduit->creerItemLien($unProduit->getIdProduit(), $unProduit->getNomProduit()));
}


$leMenuProduit = $menuProduit->creerMenuProduit($_SESSION['produit']);


$_SESSION['idProduitActif'] = $_SESSION['produit'];

foreach ($_SESSION['listeProduits']->getProduits() as $unProduit){
    if ($unProduit->getIdProduit()==$_SESSION['idProduitActif']){
        $_SESSION['produitActif']=$unProduit;
    }
}

if(isset($_POST["AjouterProduitPanier"])){
        if(!$_POST['quantite']){
            echo("<SCRIPT LANGUAGE=JavaScript>window.alert ('Veuillez saisir une quantité pour ce produit!', 'BioRelai', config='height=100, width=400, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=index.php, directories=no, status=no')</SCRIPT>");
        }
        else{
            LigneCommandeDAO::ajouter($_SESSION['idProduitActif'],$_POST['quantite'],date('Y-m-d h:i:s', time()),$_SESSION['authentification'][0]);
            echo("<SCRIPT LANGUAGE=JavaScript>window.alert ('Commande ajouter au panier!', 'BioRelai', config='height=100, width=400, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=index.php, directories=no, status=no')</SCRIPT>");
        }


}



$formProduit = new Formulaire("post", "index.php", "formProduit", "formProduit");

if($_SESSION['idProduitActif']!=0) {

    $formProduit->ajouterComposantLigne($formProduit->creerLabel("Nom: ", "labelNom"), 1);
    $formProduit->ajouterComposantLigne($formProduit->creerInputTexte("nom", "nom", $_SESSION['produitActif']->getNomProduit(), "1", "", "1"), 1);
    $formProduit->ajouterComposantTab();

    $formProduit->ajouterComposantLigne($formProduit->creerLabel("Descriptif: ", "labelDescriptif"), 1);
    $formProduit->ajouterComposantLigne($formProduit->creerInputTexte("descriptif", "descriptif",  $_SESSION['produitActif']->getDescriptifProduit(), "1", "", "1"), 1);
    $formProduit->ajouterComposantTab();

    $formProduit->ajouterComposantLigne($formProduit->creerLabel("Quantité: ", "labelQuantite"), 1);
    $formProduit->ajouterComposantLigne($formProduit->creerInputTexte("quantite", "quantite", "", "1", "Veuillez indiqué la quantité voulue", "0"), 1);
    $formProduit->ajouterComposantTab();

    $formProduit->ajouterComposantLigne($formProduit->creerInputSubmit("AjouterProduitPanier", "AjouterProduitPanier", "Ajout Panier"), 1);
    $formProduit->ajouterComposantTab();

}
else{
    $formProduit->ajouterComposantLigne($formProduit->creerLabel("Veuiller selectioner un produit! ", "labelProduit"),1);
    $formProduit->ajouterComposantTab();
}



$formProduit->creerFormulaire();


include_once 'vues/clients/vueClientAchat.php';