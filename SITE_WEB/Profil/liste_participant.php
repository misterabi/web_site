<?php session_start()?>
<!DOCTYPE html>
<html>


<?php include("../header/header.php");
include("../connexion/connexion.inc.php")
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

<?php
$nom="";
$prenom="";
$requete="Select nom,prenom from profil where id_profil=".$_COOKIE['id_profil'];
$resultat=$cnx->query($requete);
while ($igne=$resultat->fetch()){
    echo "<h2>".$igne['nom']." ".$igne['prenom']."</h2>";
}
?>

<table>
    <tr><td>Nom</td><td>Prenom</td></tr>
    <?php
    $date=$_GET['date'];
    $id_corde=$_GET['id_corde'];
    $requete="Select nom,prenom,profil.id_profil as prof from profil
        join appartient on profil.id_profil = appartient.id_profil
        join cordee on cordee.id_cordee = appartient.id_cordee
        join escalader on Escalader.id_cordee=cordee.id_cordee
        where date='$date' and appartient.id_cordee='$id_corde'";
    $resultat=$cnx->query($requete);
    while ($ligne=$resultat->fetch()){
        echo "<tr><td><a href=Profil.php?Nom=".$ligne['nom']."&prenom=".$ligne['prenom']."&id_profil=".$ligne['prof'].">".$ligne['nom']."</td><td>".$ligne['prenom']."</td></tr>";
    }
    ?>
</table></br>

<form method="post" action="Profil.php">
    <input type="submit" value="Retour">
</form>

</body>

</html>
