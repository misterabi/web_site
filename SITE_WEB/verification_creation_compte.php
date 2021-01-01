<?php
session_start();

include("connexion.inc.php");

$verification_valide=1;
$mails_valide=0;
$mot_de_passe_valide=0;

if(empty($_POST['Nom'])||empty($_POST['Prenom'])||empty($_POST['Email'])||empty($_POST['mdp'])||empty($_POST['Niveau'])){
    echo "<h1> Il manque une information lors de la création du compte</h1>";
    header("refresh:2;url=creation_compte.php");
}else{
    $Mails=$_POST['Email'];
    $Mdp=md5($_POST['mdp']);
    $Nom=$_POST['Nom'];
    $niveau=$_POST['Niveau'];
    $Prenom=$_POST['Prenom'];
    $resultat=$cnx->query("select email from profil ");
    while ($ligne=$resultat->fetch()){
        if($verification_valide==1){
            if($ligne['email']==$Mails){
                echo "<h1> Emails invalide</h1>";
                header("refresh:2;url=creation_compte.php");
                $verification_valide=0;
                break;
            }
        }
    }
    if($verification_valide==1){
        $requete="INSERT INTO profil(nom, prenom, email, mdp, niveau) values ('$Nom','$Prenom','$Mails','$Mdp','$niveau')";
        $cnx->exec($requete);
        echo "<h1>En cours de creation...</h1>";
        header("refresh:2;url=Profil.php");
    }


}