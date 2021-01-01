
<!DOCTYPE html>
<html>

<?php include("../header/header.php") ;
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
<body>
<h1>Voie: </h1>
    <?php
    $nom_voie=$_GET['nom'];
    $lieux=$_GET['lieu'];
    $id_voie=$_GET['id_voie'];
    echo "<h2>Nom de la voie: </h2>".$nom_voie;
    echo "<h2>Localisation: </h2>".$lieux;
    $requete="SELECT longueur,niveau_voie,type from voie join site on voie.id_site = site.id_site where id_voie='$id_voie'";
    $resultat=$cnx->query($requete);
    while ($ligne=$resultat->fetch()){
        echo "<h2>Longueur: </h2>".$ligne['longueur'];
        echo "<h2>Difficulter de la voie: </h2>".$ligne['niveau_voie'];
        echo "<h2>Type: </h2>".$ligne['type'];
    }
    $requete="SELECT type from maniere";
    $resultat=$cnx->query($requete);
    while ($ligne=$resultat->fetch()){
        $type=$ligne['type'];
        $requete1="SELECT date,id_cordee from public.escalader join site on type_escalade='$type' and id_voie='$id_voie' order by date asc limit 1";
        $resultat1=$cnx->query($requete1);
        while ($ligne1=$resultat1->fetch()){
            echo "<hr/><h2>Style d'escalade:</h2>".$ligne['type'];
            echo "<h2>date d'ouverture: </h2>".$ligne1['date'];
            echo "<h4>numero de la cordée: </h4>".$ligne1['id_cordee'];
        }

    }
    ?>

</br>
<form action="../Accueil.php">
    <input type="submit" value="accueil">
</form>
</body>

</html>

