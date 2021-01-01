<?php
session_start();

?>

<!DOCTYPE html>
<html>


<?php include("../header/header.php");
include ("../connexion/connexion.inc.php")
?>

<body>
<form action="../verification_creation_compte.php" method="post">
    <table>
        <tr><td><label for="Nom">Nom: </label></td><td><input type="text" name="Nom" /></td></tr>
        <tr><td><label for="Prenom">Prenom: </label></td><td><input type="text" name="Prenom" /></td></tr>
        <tr><td><label for="Niveau">Niveau: </label></td><td>
                <select name="Niveau" >
                    <?php
                    $results = $cnx->query("SELECT donnee_fr FROM difficulter");
                    foreach ($results as $service) {
                        echo "<option value=".$service['donnee_fr'].">".$service['donnee_fr']."</option>";
                    }
                    ?>>
                </select>


            </td></tr>
        <tr><td><label for="Email">Email: </label></td><td><input type="email" name="Email" /></td></tr>
        <tr><td><label for="Mdp">Mot de passe: </label></td><td><input type="password" name="mdp" /></td></tr>


    </table><br />
    <input type="submit" name="submit" value="Valider" /></br>
</form></br>
<form method="post" action="connexion_compte.php">
    <input type="submit" value="Retour">
</form>

</body>

</html>

