<?php

/*
 * création d'objet PDO de la connexion qui sera représenté par la variable $cnx
 */
$user = "postgres" ;
$pass = "abidesh";
try {
    $cnx =new pdo("pgsql:host=localhost;dbname=Projet",
        $user, // Utilisateur de la BD
        $pass // Mot de passe
    );
}
catch (PDOException $e) {
    echo "ERREUR : La connexion a échouée ";

 /* Utiliser l'instruction suivante pour afficher le détail de erreur sur la
 * page html. Attention c'est utile pour débugger mais cela affiche des
 * informations potentiellement confidentielles donc éviter de le faire pour un
 * site en production.*/
//    echo "Error: " . $e;

}


?>

