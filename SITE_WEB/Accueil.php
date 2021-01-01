<?php
?>

<!DOCTYPE html>
<html>

<head>

    <!-- En-tête du document Si avec l'UTF8 cela ne fonctionne pas mettez charset=ISO-8859-1 -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

    <!-- Balise meta  -->
    <meta name="title" content="Titre de la page"/>
    <meta name="description" content="description de la page"/>
    <meta name="keywords" content="mots-clé1, mots-clé2, ..."/>

    <!-- Indexer et suivre
    <meta name="robots" content="index,follow" /> -->

    <!--  Relier une feuille CSS externe
    <link rel='stylesheet' href='votre-fichier.css' type='text/css' /> -->

    <!-- Incorporez du CSS dans la page  -->
    <style type="text/css" media="screen">

        img {
            float: right;
        }

    </style>


</head>
<?php include("header/header.php") ;
 include ("connexion/connexion.inc.php")?>
<body>
<form method="post" action="Profil/connexion_compte.php">
    <input type="submit" value="Profils">
</form></br>

<form method="post" action="Voie/recherche_site.php">
    <input type="search" value="Nom de la voie" name="nom_voie">
    <select name="Niveau" >
        <?php
        $results = $cnx->query("SELECT donnee_fr FROM difficulter");
        foreach ($results as $service) {
            echo "<option value=".$service['donnee_fr'].">".$service['donnee_fr']."</option>";
        }
        ?>>
    </select>
    <input type="search" value="localité" name="lieux">
    <select name="type" >
    <?php
        $results = $cnx->query("SELECT type FROM type_voie");
        foreach ($results as $service) {
            echo "<option value=".$service['type'].">".$service['type']."</option>";
    }
    ?>
    </select>
    <input type="submit" value="Valider">

</form></br>
<form method="post" action="Voie/recherche_guide.php">
    <input type="search" value="recherche guide">
</form></br>

<form method="post" action="Organisation_sortie.php">
    <input type="submit" value="Organisation sortie">
</form></br>

</body>

</html>

