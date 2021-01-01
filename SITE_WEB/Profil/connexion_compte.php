
<!DOCTYPE html>
<html>
<?php include("../header/header.php") ;
include("../connexion/auth.php");
?>



<h1>Formulaire de saisie de login et de mot de passe</h1>

<form action="../connexion/auth.php" method="post">
    <table>
        <tr><td><label for="email">Email</label></td><td><input type="text" name="mail" /></td></tr>
        <tr><td><label for="mdp">Mot de passe</label></td><td><input type="password" name="mdp" /></td></tr>
    </table>
    <br />
    <input type="submit" name="submit" value="Valider" />
</form></br>

<form method="post" action="creation_compte.php">
    <input type="submit" name="submit" value="Création compte" />
</form><br>

<form action="../Accueil.php">
    <button type="submit">Retour</button>
</form>

</body>
</html>
