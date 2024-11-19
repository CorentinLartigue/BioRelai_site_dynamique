<?php

$formInscription = new Formulaire("post","index.php","formuInscrip","formuInscrip");
$formInscription->ajouterComposantLigne($formInscription->creerLabel("Mail: " , "labelMail") , 1 );
$formInscription->ajouterComposantLigne($formInscription->creerInputTexte("mail", "mail","" , "1", "Entrez un mail","0") , 1 );
$formInscription->ajouterComposantTab();

$formInscription->ajouterComposantLigne($formInscription->creerLabel("Mdp: " , "labelMdp") , 1 );
$formInscription->ajouterComposantLigne($formInscription->creerInputMdp('mdp', 'mdp',  "",1, "Entrez votre mot de passe", "0",''),1);
$formInscription->ajouterComposantTab();

$formInscription->ajouterComposantLigne($formInscription->creerLabel("Nom: " , "labelNomUtilisateur") , 1 );
$formInscription->ajouterComposantLigne($formInscription->creerInputTexte("nomUtilisateur", "nomUtilisateur","" , "1", "Entrez votre nom","0") , 1 );
$formInscription->ajouterComposantTab();


$formInscription->ajouterComposantLigne($formInscription->creerLabel("Prenom: " , "labelPrenomUtilisateur") , 1 );
$formInscription->ajouterComposantLigne($formInscription->creerInputTexte("prenomUtilisateur", "prenomUtilisateur","" , "1", "Entrez votre prenom","0") , 1 );
$formInscription->ajouterComposantTab();

$formInscription->ajouterComposantLigne($formInscription->creerInputSubmit("submitInscript", "submitInscript", "Valider"),1);
$formInscription->ajouterComposantTab();


$formInscription->creerFormulaire();


require_once 'vues/visiteurs/vueInscription.php';
