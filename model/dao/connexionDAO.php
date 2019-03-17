<?php
	/** 
	 * files used for declaring the connexion function, but 
	 * which also create $bdd. it can be used in every files if
	 * we include the connexionDAO.php
	 * **/

	function connexion() {
		/**
		* function charged to connect to the database using 
		*a PHP Data Object(PDO): https://secure.php.net/manual/en/book.pdo.php
		**/

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
	}		

	$bdd=connexion();
?>