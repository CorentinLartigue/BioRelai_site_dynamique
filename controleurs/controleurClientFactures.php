<?php
$_SESSION['idCommandeActif']=0;
$_SESSION['listeCommandesValide'] = new Commandes(CommandeDAO::lesCommandes($_SESSION['authentification'][0],"VALIDER"));

if (isset($_GET['commande'])) {
    $_SESSION['commande'] = $_GET['commande'];

} else {
    if (!isset($_SESSION['commande'])) {
        $_SESSION['commande'] = "0";
    }
}


$menuCommande = new Menu("menuCommande");


foreach ($_SESSION['listeCommandesValide']->getCommandes() as $uneCommande) {
    $menuCommande->ajouterComposant($menuCommande->creerItemLien($uneCommande->getIdCommande(), $uneCommande->getDateCommande()));
}


$leMenuCommandeValider = $menuCommande->creerMenuCommande($_SESSION['commande']);


$_SESSION['idCommandeActif'] = $_SESSION['commande'];

foreach ($_SESSION['listeCommandesValide']->getCommandes() as $uneCommande){
    if ($uneCommande->getIdCommande()==$_SESSION['idCommandeActif']){
        $_SESSION['commandeActif']=$uneCommande;
    }
}
$formCommandeValider = new Formulaire("post", "index.php", "formCommande", "formCommande");

if(empty($_SESSION['listeCommandesValide']->getCommandes())) {
    $formCommandeValider->ajouterComposantLigne($formCommandeValider->creerLabel("Vous n'avez pas de commande!", "labelProduit"), 1);
    $formCommandeValider->ajouterComposantTab();
}
else if ($_SESSION['idCommandeActif'] != 0) {

        $formCommandeValider->ajouterComposantLigne($formCommandeValider->creerLabel("Date: ", "labelDate"), 1);
        $formCommandeValider->ajouterComposantLigne($formCommandeValider->creerInputTexte("date", "date", $_SESSION['commandeActif']->getDateCommande(), "1", "", "1"), 1);
        $formCommandeValider->ajouterComposantTab();

        $formCommandeValider->ajouterComposantLigne($formCommandeValider->creerLabel("nomProduit: ", "labelProduit"), 1);
        $formCommandeValider->ajouterComposantLigne($formCommandeValider->creerInputTexte("produit", "produit", CommandeDAO::getInfosProduit($_SESSION['idCommandeActif'])[0], "1", "", "1"), 1);
        $formCommandeValider->ajouterComposantTab();

        $formCommandeValider->ajouterComposantLigne($formCommandeValider->creerLabel("quantite: ", "labelQuantite"), 1);
        $formCommandeValider->ajouterComposantLigne($formCommandeValider->creerInputTexte("quantite", "quantite", CommandeDAO::getInfosProduit($_SESSION['idCommandeActif'])[1], "1", "", "1"), 1);
        $formCommandeValider->ajouterComposantTab();


    } else {
        $formCommandeValider->ajouterComposantLigne($formCommandeValider->creerLabel("Veuiller selectioner une commande! ", "labelProduit"), 1);
        $formCommandeValider->ajouterComposantTab();
    }


$formCommandeValider->creerFormulaire();

include_once 'vues/clients/vueClientCommandeValider.php';