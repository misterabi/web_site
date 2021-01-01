
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
<h1>SITE</h1>
<table>
    <?php
        if(isset($_POST['nom_voie'])){
            $nom=$_POST['nom_voie'];
        }
        if(isset($_POST['Niveau'])){
            $niveau=$_POST['Niveau'];

        }
        if(isset($_POST['lieux'])){
            $lieux=$_POST['lieux'];
        }
        if(isset($_POST['type'])){
        $type=$_POST['type'];
        }

        if($nom!=""&&$lieux!=""){
            $requete="SELECT voie.nom,localisation,id_voie from voie join site on voie.id_site = site.id_site 
                where voie.nom='$nom' and localisation='$lieux' and niveau_voie='$niveau' and type='$type'";
        }else if($nom!=""){
            $requete="SELECT voie.nom,localisation,id_voie from voie join site on voie.id_site = site.id_site 
                where voie.nom='$nom'  and niveau_voie='$niveau' and type='$type'";
        }else if($lieux!=""){
            $requete="SELECT voie.nom as nom,localisation,id_voie from voie join site on voie.id_site = site.id_site 
                where localisation='$lieux' and niveau_voie='$niveau' and type='$type'";
        }else{
            $requete="SELECT voie.nom as nom,localisation,id_voie from voie join site on voie.id_site = site.id_site 
                where niveau_voie='$niveau' and type='$type'";
        }
        $resulat=$cnx->query($requete);
        while ($ligne=$resulat->fetch()){
            echo "<tr><td><a href=info_voie.php?nom=".$ligne['nom']."&lieu=".$ligne['localisation']."&id_voie=".$ligne['id_voie'].">".$ligne['nom']."</td><td>".$ligne['localisation']."</td></tr>";
        }

    ?>
</table>
</body>

</html>

