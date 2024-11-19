<?php
$formCompte = new Formulaire("post", "index.php", "formCompte", "formCompte");


if(isset($_POST["CompteModif"])) {

    $formCompte->ajouterComposantLigne($formCompte->creerLabel("Mail: ", "labelMail"), 1);
    $formCompte->ajouterComposantLigne($formCompte->creerInputTexte("mail", "mail", $_SESSION['authentification'][1], "1", "", "0"), 1);
    $formCompte->ajouterComposantTab();

    $formCompte->ajouterComposantLigne($formCompte->creerLabel("Mot de passe: ", "labelMdp"), 1);
    $formCompte->ajouterComposantLigne($formCompte->creerInputMdp('mdp', 'mdp', $_SESSION['authentification'][2], "1", "", "0",''), 1);
    $formCompte->ajouterComposantTab();

    $formCompte->ajouterComposantLigne($formCompte->creerLabel("Nom: ", "labelNomUtilisateur"), 1);
    $formCompte->ajouterComposantLigne($formCompte->creerInputTexte("nomUtilisateur", "nomUtilisateur", $_SESSION['authentification'][4], "1", "", "0"), 1);
    $formCompte->ajouterComposantTab();

    $formCompte->ajouterComposantLigne($formCompte->creerLabel("Prenom: ", "labelPrenomUtilisateur"), 1);
    $formCompte->ajouterComposantLigne($formCompte->creerInputTexte("prenomUtilisateur", "prenomUtilisateur", $_SESSION['authentification'][5], "1", "", "0"), 1);
    $formCompte->ajouterComposantTab();

    $formCompte->ajouterComposantLigne($formCompte->creerInputSubmit("CompteEnregistrerModif", "CompteEnregistrerModif", "Enregistrer"), 1);
    $formCompte->ajouterComposantLigne($formCompte->creerInputSubmit("CompteAnnuler", "CompteAnnuler", "Annuler"), 1);
    $formCompte->ajouterComposantTab();

}
else {

    $formCompte->ajouterComposantLigne($formCompte->creerLabel("Mail: ", "labelMail"), 1);
    $formCompte->ajouterComposantLigne($formCompte->creerInputTexte("mail", "mail", $_SESSION['authentification'][1], "1", "", "1"), 1);
    $formCompte->ajouterComposantTab();

    $formCompte->ajouterComposantLigne($formCompte->creerLabel("Mot de passe: ", "labelMdp"), 1);
    $formCompte->ajouterComposantLigne($formCompte->creerInputMdp('mdp', 'mdp', $_SESSION['authentification'][2], "1", "","1", ''), 1);
    $formCompte->ajouterComposantTab();

    $formCompte->ajouterComposantLigne($formCompte->creerLabel("Nom: ", "labelNomUtilisateur"), 1);
    $formCompte->ajouterComposantLigne($formCompte->creerInputTexte("nomUtilisateur", "nomUtilisateur", $_SESSION['authentification'][4], "1", "", "1"), 1);
    $formCompte->ajouterComposantTab();

    $formCompte->ajouterComposantLigne($formCompte->creerLabel("Prenom: ", "labelPrenomUtilisateur"), 1);
    $formCompte->ajouterComposantLigne($formCompte->creerInputTexte("prenomUtilisateur", "prenomUtilisateur", $_SESSION['authentification'][5], "1", "", "1"), 1);
    $formCompte->ajouterComposantTab();

    $formCompte->ajouterComposantLigne($formCompte->creerInputSubmit("CompteModif", "CompteModif", "Modifier"), 1);
    $formCompte->ajouterComposantLigne($formCompte->creerInputSubmit("CompteSupprimer", "CompteSupprimer", "Supprimer"), 1);
    $formCompte->ajouterComposantTab();

}
$formCompte->creerFormulaire();

include_once 'vues/clients/vueClientCompte.php';