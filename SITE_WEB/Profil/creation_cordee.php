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

<form  method="post" action="confirmation_creation_cordee.php">
    desciption: <input type="text"  name="description" ></br>

    date :<input type="date" name="date"></br>

    nombre de maximum de participant: <input type="number"  min="0" max="20" name="nb_max_pp"></br>

    niveau minimum requis:

    <select name="Niveau_min" >
        <?php
        $results = $cnx->query("SELECT donnee_fr FROM difficulter");
        foreach ($results as $service) {
            echo "<option value=".$service['donnee_fr'].">".$service['donnee_fr']."</option>";
        }
        ?>>
    </select></br>

    lieux d'escalade:

    <select name="lieux" >
        <?php
        $results = $cnx->query("SELECT nom,id_site FROM site");
        foreach ($results as $service) {
            echo "<option value=".$service['id_site'].">".$service['nom']."</option>";
        }
        ?>>
    </select></br>

        <input type="submit" value="Confirmer">

</form>

</br>

<form method="post" action="../Accueil.php">
    <input type="submit" value="Accueil">
</form>

<form method="post" action="../deconnexion.php">
    <input type="submit" value="deconnexion">
</form>


</body>

</html>
