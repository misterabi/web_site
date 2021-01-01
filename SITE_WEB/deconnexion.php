<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>deconnexion</title>
    <style type="text/css">
        body {
            background-color:#ffd;
            font-family:Verdana,Helvetica,Arial,sans-serif;
        }
    </style>
</head>

<body>
<?php
include("connexion.inc.php");
session_destroy();
header("refresh:0;url=accueil.php");
?>
</body>
</html>
