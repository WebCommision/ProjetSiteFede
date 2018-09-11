<?php
session_start();
//On détruit toutes les variables de session
$_SESSION = array();
session_destroy();
//J'ai mis connexion.php en attendant mais faudrait mettre menu.php
header('Location: ../accueil.php');
?>