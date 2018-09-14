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

	<!-- Side bar-->
    <div class="container">

    	<div class= "col-sm-2 hidden-xs sidebar" >

    		<h5 style="margin-left: 2rem;">Cercles de la Fédé : </h5>

    		<ul style="list-style-type: none; padding-left: 3rem;">

	    		<?php
	                
	                // On récupère tout le contenu de la table cercles
	                $reponse = $bdd->query('SELECT * FROM cercle ORDER BY id_cercle');

	                // On affiche chaque entrée une à une
	                while ($donnees = $reponse->fetch()) {

	            ?>

                <li>
                	
                    <a class="sidebarAnchor" href="./cercle.php?id=<?php echo $donnees['id_cercle'] ?>"><div class="sidebarElement"><?php echo $donnees['nom_cercle'] ?> 	</div></a>
                   
                </li>

                <?php

	                }
	                
	                $reponse->closeCursor(); // Termine le traitement de la requête

                ?>

            </ul>

    	</div>				

    	<div class= "col-xs-12 col-sm-8" style="padding-left: 3rem;padding-right: 3rem;">

		   	<article> 

		   		<?php

		   		include ("../model/dao/cercleDAO.php");

		   		$id_actuel=$_GET['id'];
				$cercle=selectById($bdd,$id_actuel);
				$minid=selectFirstId($bdd);
				$maxid=selectLastId($bdd);

				include ("../controller/previousnext.php");

				$id_previous=previousId($minid);
				$id_next=nextId($maxid);
				$cercle_previous=selectById($bdd,$id_previous);
				$cercle_next=selectById($bdd,$id_next);
				
				





				

				?>

			   	<!-- bouton retour vers la page des cercles-->
			   	
				<div class= "col-md-12 btndiv"> 

				   	<div align="center" class= "col-xs-6"> <a href="./cercle.php?id=<?php echo $id_previous ?>" class="gras btn btn-danger btn-xs"> <span class="glyphicon glyphicon-menu-left"></span> <?php echo $cercle_previous['nom_cercle'] ?> </a> </div>

				   	<div align="center" class= "col-xs-6"> <a href="./cercle.php?id=<?php echo $id_next ?>" class="gras btn btn-danger btn-xs"> <?php echo $cercle_next['nom_cercle'] ?> <span class="glyphicon glyphicon-menu-right"></span></a> </div>
				
				</div>
				
				<div class="margintop marginbottom" >

					<h5 class="center"><?php echo $cercle['nom_cercle']; ?></h5>		

					<p>
			   			<?php echo $cercle['description_cercle']; ?> <br>
			   			<br> 

			   		<div align="center">
			   			<!--<img class= "center" src="<?php echo $cercle['logo_cercle'] ?> "> -->
			   		</div>

			  		</p>

				</div>

				
		    </article>

    	</div>	

    	<div class= "col-sm-2 col-xs-12 sidebar" >

    		<?php

    		$comiteArray=selectComites($bdd,$cercle["nom_cercle"]);

    		?>
    		<h5 style="margin-left: 2rem;">Liste des comités : </h5>
    		<ul style="list-style-type: none; padding-left: 3rem;">

	    		<?php

	                foreach ($comiteArray as list ($id_comite,$promotion,$theme_comite,$nom_cercle)) {

	                	?><li> <div class="sidebarElement dropdown"> 
	                		<span data-toggle="dropdown" class="dropdown-toggle"><?php echo "$promotion \n $theme_comite";?> </span>
	                		<ul class="dropdown-menu">

	                			<?php  

	                				$comitardsArray=selectComitards($bdd,$id_comite);
	                				foreach ($comitardsArray as list($nom_poste,$nom_utilisateur,$id_utilisateur)) {



	                					?> 
	                					<li>
	                						<a style="color:black !important;" href='profil.php?id_utilisateur=  <?php echo $id_utilisateur ; ?> ' > 
	                						<?php echo "$nom_poste :\n $nom_utilisateur";?>
	                						</a>
	                					</li>

	                					<?php

	                				}

	                			?>

	                		</ul>


	                		</div> 
						</li> <?php
	                	
	                }

	            ?>    

            </ul>

    	</div>	

	</div>

 	<?php include("./footer.php"); ?>

    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>