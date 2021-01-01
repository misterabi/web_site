<?php
session_start();
setcookie("Autentification","Profil",time()+3600);

include("connexion.inc.php");
$autentification_valide=0;
$pseudo_valide=0;
$mot_de_passe_valide=0;
$iD_Profils=0;

if(isset($_POST['mail'])&&isset($_POST['mdp'])){
    $mdp=$_POST['mdp'];
    $mail=$_POST['mail'];
}elseif (isset($_SESSION['Email']) && isset($_SESSION['MotDePasse'])){
    $mdp=$_SESSION['MotDePasse'];
    $mail=$_SESSION['Email'];
}
if((isset($_POST['mail'])&&isset($_POST['mdp']))|| (isset($_SESSION['Email']) && isset($_SESSION['MotDePasse'])) ){
    $resultat=$cnx->query("select id_profil,email,mdp from profil ");
    while($ligne= $resultat->fetch()){
        if($autentification_valide==0) {
            if ($ligne['email'] == $mail and $pseudo_valide != 1) {
                $pseudo_valide = 1;
                if ($ligne['mdp'] == $mdp) {
                    $iD_Profils=$ligne['id_profil'];
                    $mot_de_passe_valide = 1;
                    $autentification_valide=1;
                }
            }
        }
    }
    if($mot_de_passe_valide&&$pseudo_valide){

        $_SESSION['MotDePasse']=$mdp;
        $_SESSION['Email']=$mail;
        $_SESSION['id_profil']=$iD_Profils;
        setcookie("id_profil",$iD_Profils,time()+60*30);
        echo "Vous êtes authentifié comme l'utilisateur ".$_SESSION['Email']."</br>";
        header("refresh:2;url=../Profil/Profil.php");
    }elseif ($pseudo_valide==0){
        echo "login incorrect</br> ";
        header("refresh:1;url=connexion_compte.php");
    }else {
        echo "mot de passe incorrect</br>";
        header("refresh:1;url=connexion_compte.php");
    }

}else{
    header("refresh:10;url=connexion_compte.php");
}
?>

