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
                $reponse=$bdd->query('SELECT *, nom_utilisateur FROM site JOIN utilisateur ON site.id_utilisateur=utilisateur.id_utilisateur');

                // On affiche chaque entrée une à une
                while ($donnees = $reponse->fetch()) {

                    
                ?>

                <div class="col-md-2 col-sm-3 col-xs-4">

                    <h5 style="text-align:center;"><a target="_blank" href="<?php echo $donnees['url_site'] ?>"><?php echo $donnees['nom_site'] ?></a><br></h5>

                    <p class="center" style="font-size: 1rem;">

                        <br>
                        <?php echo $donnees['description_site'] ?>
                        <br>
                        <br>
                        Proposé par: <?php echo $donnees['nom_utilisateur'] ?>


                        


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