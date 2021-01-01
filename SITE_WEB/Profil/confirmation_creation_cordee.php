<?php
session_start();

include ("../connexion/connexion.inc.php");

$verification_valide=1;
$mails_valide=0;
$mot_de_passe_valide=0;

if(empty($_POST['description'])||empty($_POST['date'])||empty($_POST['nb_max_pp'])||empty($_POST['Niveau_min'])||empty($_POST['lieux'])){
    echo "<h1> Il manque une information afin de confirmer la création de la cordée</h1>";
    header("refresh:2;url=creation_cordee.php");
}else{
    $description=$_POST['description'];
    $date=$_POST['date'];
    $nb_max=$_POST['nb_max_pp'];
    $niveau_min=$_POST['Niveau_min'];
    $lieux=$_POST['lieux'];
    $id_prof=$_SESSION['id_profil'];
    echo $description;
    $requete="INSERT INTO sortie(description, date, nb_max_participant, status_sortie, id_profil, id_site, niv_minim) VALUES('$description','$date','$nb_max','TRUE','$id_prof','$lieux','$niveau_min') ";
    $cnx->exec($requete);
    echo "création de la cordée en cours...";
    header("refresh:2;url=Profil.php");
}