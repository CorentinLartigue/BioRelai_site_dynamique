<?php
$_SESSION['idCommandeActif']=0;
$liste= new Commandes(CommandeDAO::lesCommandes($_SESSION['authentification'][0],"EN_COURS"));
$_SESSION['listeCommandes'] =$liste;

if (isset($_GET['commande'])) {
    $_SESSION['commande'] = $_GET['commande'];

} else {
    if (!isset($_SESSION['commande'])) {
        $_SESSION['commande'] = "0";
    }
}


$menuCommande = new Menu("menuCommande");


foreach ($_SESSION['listeCommandes']->getCommandes() as $uneCommande) {
    $menuCommande->ajouterComposant($menuCommande->creerItemLien($uneCommande->getIdCommande(), "Commande n°".$uneCommande->getIdCommande()." du ".$uneCommande->getDateCommande()));
}


$leMenuCommandeEnCours = $menuCommande->creerMenuCommande($_SESSION['commande']);


$_SESSION['idCommandeActif'] = $_SESSION['commande'];

foreach ($_SESSION['listeCommandes']->getCommandes() as $uneCommande){
    if ($uneCommande->getIdCommande()==$_SESSION['idCommandeActif']){
        $_SESSION['commandeActif']=$uneCommande;
    }
}

if(isset($_POST["ValiderCommande"])) {
    CommandeDAO::validerCommande($_SESSION['idCommandeActif'], date('y-m-d h:i:s ', time()), "VALIDER");
    $_SESSION['commande'] = "0";
    $_SESSION['idCommandeActif'] = "0";
    ob_end_clean();
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

if(isset($_POST["SupprimerCommande"])){
    CommandeDAO::supprimerCommande($_SESSION['idCommandeActif']);
    $_SESSION['commande'] = "0";
    $_SESSION['idCommandeActif'] = "0";

    foreach ($_SESSION['listeCommandes']->getCommandes() as $i => $uneCommande) {
        if ($uneCommande->getIdCommande() == $_SESSION['idCommandeActif']) {
            unset ($_SESSION['listeCommandes']->getCommandes()[$i]);
        }
    }

    $_SESSION['listeCommandes']->setCommandes(array_values($_SESSION['listeCommandes']->getCommandes()));

    ob_end_clean();
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();

}


$formCommandeEnCours = new Formulaire("post", "index.php", "formCommande", "formCommande");


if (empty($_SESSION['listeCommandes']->getCommandes())) {
    $formCommandeEnCours->ajouterComposantLigne($formCommandeEnCours->creerLabel("Vous n'avez pas de commande! ", "labelCommande"), 1);
    $formCommandeEnCours->ajouterComposantTab();
} else{
    if(isset($_POST["ModifCommande"])) {
    $formCommandeEnCours->ajouterComposantLigne($formCommandeEnCours->creerLabel("Nom Produit: ", "labelProduit"), 1);
    $formCommandeEnCours->ajouterComposantLigne($formCommandeEnCours->creerInputTexte("produit", "produit", CommandeDAO::getInfosProduit($_SESSION['idCommandeActif'])[0], "1", "", "1"), 1);
    $formCommandeEnCours->ajouterComposantTab();

    $formCommandeEnCours->ajouterComposantLigne($formCommandeEnCours->creerLabel("Quantite: ", "labelQuantite"), 1);
    $formCommandeEnCours->ajouterComposantLigne($formCommandeEnCours->creerInputTexte("quantite", "quantite", "", "1", "Veuillez selectionner une nouvelle quantité", "0"), 1);
    $formCommandeEnCours->ajouterComposantTab();

    $formCommandeEnCours->ajouterComposantLigne($formCommandeEnCours->creerInputSubmit("EnregistrerModifCommande", "EnregistrerModifCommande", "Modifier Commande"), 1);
    $formCommandeEnCours->ajouterComposantTab();

    $formCommandeEnCours->ajouterComposantLigne($formCommandeEnCours->creerInputSubmit("AnnulerModifCommande", "AnnulerModifCommande", "Annuler"), 1);
    $formCommandeEnCours->ajouterComposantTab();
    }
    else if ($_SESSION['idCommandeActif'] != 0) {
    $formCommandeEnCours->ajouterComposantLigne($formCommandeEnCours->creerLabel("Nom Produit: ", "labelProduit"), 1);
    $formCommandeEnCours->ajouterComposantLigne($formCommandeEnCours->creerInputTexte("produit", "produit", CommandeDAO::getInfosProduit($_SESSION['idCommandeActif'])[0], "1", "", "1"), 1);
    $formCommandeEnCours->ajouterComposantTab();

    $formCommandeEnCours->ajouterComposantLigne($formCommandeEnCours->creerLabel("Quantite: ", "labelQuantite"), 1);
    $formCommandeEnCours->ajouterComposantLigne($formCommandeEnCours->creerInputTexte("quantite", "quantite", CommandeDAO::getInfosProduit($_SESSION['idCommandeActif'])[1], "1", "", "1"), 1);
    $formCommandeEnCours->ajouterComposantTab();

    $formCommandeEnCours->ajouterComposantLigne($formCommandeEnCours->creerInputSubmit("ValiderCommande", "ValiderCommande", "Valider Commande"), 1);
    $formCommandeEnCours->ajouterComposantTab();

    $formCommandeEnCours->ajouterComposantLigne($formCommandeEnCours->creerInputSubmit("SupprimerCommande", "SupprimerCommande", "Supprimer Commande"), 1);
    $formCommandeEnCours->ajouterComposantTab();

    $formCommandeEnCours->ajouterComposantLigne($formCommandeEnCours->creerInputSubmit("ModifCommande", "ModifCommande", "Modifier Commande"), 1);
    $formCommandeEnCours->ajouterComposantTab();
    }
    else {
        $formCommandeEnCours->ajouterComposantLigne($formCommandeEnCours->creerLabel("Veuiller selectioner une commande! ", "labelCommande"), 1);
        $formCommandeEnCours->ajouterComposantTab();
    }
}
$formCommandeEnCours->creerFormulaire();


include_once 'vues/clients/vueClientCommandeEnCours.php';