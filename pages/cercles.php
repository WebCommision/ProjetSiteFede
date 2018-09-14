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

    <div class="container bord padding3">

	       <article>

			 	<?php
				
				// On récupère tout le contenu de la table cercles
				$reponse = $bdd->query('SELECT nom_cercle, id_cercle, logo_cercle FROM cercle order BY id_cercle');

				// On affiche chaque entrée une à une, utiliser logo en 151x151 px !
				while ($cercle = $reponse->fetch()) {
				?>

				<div class="col-md-3 col-sm-3 col-xs-4">
					<h5>
						   <a href="./cercle.php?id=<?php echo $cercle['id_cercle'] ?>">
						   <img src="<?php echo $cercle['logo_cercle'] ?>"></a> <br />
						   <div style="margin-top: 0.5rem;"> <?php echo $cercle['nom_cercle']; ?> 
						</div>
				   </h5>
				</div>

				<?php
				}
				
				$reponse->closeCursor(); // Termine le traitement de la requête

				?>
				

		    </article>

	</div>

 	<?php include("./footer.php"); ?>
    
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>



















