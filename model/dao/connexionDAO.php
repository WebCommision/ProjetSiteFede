<?php
	

	function connexion() {

		try {

		   $bdd = new PDO('mysql:host=localhost;
		   dbname=bdd_site_fede;charset=utf8', 
		   'root', '');
		   $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   	return $bdd;

		} catch (Exception $e)
		{
	    	die('Erreur : ' . $e->getMessage());
		}
	}		// Sous WAMP (Windows)

	$bdd=connexion();
?>