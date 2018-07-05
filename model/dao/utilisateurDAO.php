<?php

	function selectCarriere($bdd,$id_utilisateur) {

		////////////////////////////////////////////////stock data into array
				// run query
				$query = $bdd->prepare("SELECT nom_poste, promotion_comite, nom_cercle FROM election join comite on election.id_comite= comite.id_comite where id_utilisateur=? ORDER BY promotion_comite ASC");
				$query->execute(array($id_utilisateur));

				// set array
				$array = array();

				// look through query
				while($row = $query->fetch()){

				  // add each row returned into an array
				  $array[] = $row;
				 

				}
				return $array;
	}


?>