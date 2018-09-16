<?php
	session_start();

	include("connexionDAO.php");
	$req = $bdd -> prepare('DELETE FROM utilisateur WHERE id_utilisateur = :id ');
    $req -> execute(array('id' => $_SESSION['id_utilisateur']));
    include("../../controller/deconnexion.php");
    header("location: ../../pages/accueil.php");


?>