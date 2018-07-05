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
                $reponse = $bdd->query('SELECT nom_chant, id_chant FROM chant ORDER BY nom_chant');

                // On affiche chaque entrée une à une
                while ($donnees = $reponse->fetch()) {
                ?>

                <div class="col-md-2 col-sm-3 col-xs-4">

                    <p class="center">

                        <a href="./chant.php?id=<?php echo $donnees['id_chant'] ?>"><?php echo $donnees['nom_chant'] ?></a><br>
                   
                    </p>

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