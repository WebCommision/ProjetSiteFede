<?php
session_start();
?>

<?php include("../model/dao/connexionDAO.php"); ?>
<?php include("../controller/getConnexionData.php"); ?>

<!DOCTYPE html>
<html>
<head>
        
   <?php include("./header.php"); ?>
 
</head>
<body>

	<?php include("./navbar.php"); ?>

    <?php include("./event.php"); ?>

    <div class="container">

    	<div class= "col-sm-2 hidden-xs sidebar" >

    		<ul style="list-style-type: none; padding-left: 3rem;">

	    		<?php

	                // On récupère tout le contenu de la table cercles
	                $reponse = $bdd->query('SELECT id_chant, nom_chant FROM chant ORDER BY id_chant');

	                // On affiche chaque entrée une à une
	                while ($donnees = $reponse->fetch()) {

	            ?>

                <li>
                	
                    <a class="sidebarAnchor" href="./chant.php?id=<?php echo $donnees['id_chant'] ?>"><div class="sidebarElement"><?php echo $donnees['nom_chant'] ?> 	</div></a>
                   
                </li>

                <?php

	                }
	                
	                $reponse->closeCursor(); // Termine le traitement de la requête

                ?>

            </ul>

    	</div>		

    	<div class= "col-xs-12 col-sm-10">

		   	<article>

		   		<?php
		   		
		   		include ("../model/dao/chantDAO.php");
				
				$id_actuel=$_GET['id'];
				$chant=selectById($bdd,$id_actuel);
				$minid=selectFirstId($bdd);
				$maxid=selectLastId($bdd);

				include ("../controller/previousnext.php");

				$id_previous=previousId($minid);
				$id_next=nextId($maxid);
				$chant_previous=selectById($bdd,$id_previous);
				$chant_next=selectById($bdd,$id_next);

				?>

			   	<!-- bouton retour vers la page des cercles-->
			    
			    <div class= "col-md-12 btndiv"> 

				   	<div align="center" class= "col-xs-6"> <a href="./chant.php?id=<?php echo $id_previous ?>" class="gras btn btn-danger btn-xs"> <span class="glyphicon glyphicon-menu-left"></span> <?php echo $chant_previous['nom_chant'] ?> </span></a> </div>

				   	<div align="center" class= "col-xs-6"> <a href="./chant.php?id=<?php echo $id_next ?>" class="gras btn btn-danger btn-xs"> <?php echo $chant_next['nom_chant'] ?> <span class="glyphicon glyphicon-menu-right"></span></a> </div>

			    </div>

				<div class="margintop marginbottom" > 

					<p class="center">
						<?php echo $chant['nom_chant']; ?> <br> 
						Air: <?php echo $chant['air_chant']; ?> <br> 
						Paroles: <?php echo $chant['parole_chant']; ?> <br> 
						<?php echo $chant['description_chant']; ?> <br> 
				   		posté par : <?php echo $chant['id_utilisateur']; ?> <br> 
				   		<audio src="<?php echo $chant['path_chant'] ?>" controls>Veuillez mettre à jour votre navigateur !</audio>
				   
				   </p>

				</div>
			
		    </article>

		</div>

	</div>

 	<?php include("./footer.php"); ?>

    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>