<?php session_start()?>
<!DOCTYPE html>
<html>


<?php
include("../header/header.php");
include ("../connexion/connexion.inc.php")
?>


<body>
<style>
    table{
        border: 1px solid #333;
    }
    td{
        border: 1px solid #333;
    }
</style>

<h1> Profil</h1>
<?php
if(empty($_GET['mails'])&&empty($_GET['mdp'])&&empty($_GET['id_profil'])) {
    $requete = "Select nom,prenom,id_profil from profil where id_profil=" . $_COOKIE['id_profil'];
    $resultat = $cnx->query($requete);
    while ($igne = $resultat->fetch()) {
        $id_profils=$igne['id_profil'];
        echo "<h2>" . $igne['nom'] . " " . $igne['prenom'] . "</h2>";
    }
    echo " <form method='post' action='creation_cordee.php'><input type='submit' value='Creation cordée'></form>";
}else{
    echo "<h2>".$_GET['Nom']." ".$_GET['prenom']."</h2>";
    $id_profils=$_GET['id_profil'];
}
?>

    <table>

        <tr><td>Numero de cordée</td><td>Date</td><td>Site</td><td>Type d'escalade</td><td>Nom de Voie</td></tr>

        <?php
        $requete="Select site.nom as site,Escalader.id_cordee as cordee ,Escalader.date,type_escalade,Voie.nom as voie 
            from escalader join voie on Escalader.id_voie = voie.id_voie 
                join cordee on Escalader.Id_cordee = cordee.id_cordee 
                join sortie on cordee.id_sortie = sortie.id_sortie 
                join site on sortie.id_site = site.id_site 
                join appartient on cordee.id_cordee = cordee.id_cordee 
                join profil on appartient.id_profil = profil.id_profil 
                where profil.id_profil=".$id_profils;
        $resultat=$cnx->query($requete);
        while ($ligne=$resultat->fetch()){
            echo "<tr><td>".$ligne['cordee']."</td><td><a href=liste_participant.php?date=".$ligne['date']."&id_corde=".$ligne['cordee'].">".$ligne['date']."</td><td>".$ligne['site']."</td><td>".$ligne['type_escalade']."</td><td>".$ligne['voie']."</td></tr>";
        }
        ?>

</table>

</br>

<form method="post" action="../Accueil.php">
    <input type="submit" value="Accueil">
</form>

<form method="post" action="../deconnexion.php">
    <input type="submit" value="deconnexion">
</form>


</body>

</html>
