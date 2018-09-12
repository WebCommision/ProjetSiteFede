<?php

	function selectById($bdd,$id) {
	    
		// On récupère tout le contenu de la table chant
		$reponse= $bdd->prepare('SELECT * from chant where id_chant=?');
		$reponse->execute(array($id));

		// On recupere la ligne
		return $reponse->fetch();

		$reponse->closeCursor(); // Termine le traitement de la requête

	}

	function selectFirstId($bdd){

		$reponse = $bdd->prepare('SELECT MIN(id_chant) AS id_min FROM chant');
		$reponse->execute();
		
		return $reponse->fetch();

		$reponse->closeCursor(); // Termine le traitement de la requête

	}

	function selectLastId($bdd){

		$reponse = $bdd->prepare('SELECT MAX(id_chant) AS id_max FROM chant');
		$reponse->execute();
		
		return $reponse->fetch();

		$reponse->closeCursor(); // Termine le traitement de la requête
	}
?>