<?php
	

	function connexion() {

		try {

	   	$bdd = new PDO('mysql:host=localhost;dbname=bdd_site_fede;charset=utf8', 'root', '');
	   	return $bdd;

		} catch (Exception $e)
		{
	    	die('Erreur : ' . $e->getMessage());
		}
	}		// Sous WAMP (Windows)

	$bdd=connexion();
?>