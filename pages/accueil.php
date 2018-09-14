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
                <div class="flex">
                    <div class="onFlex">
                        <img class="img100" src="../resources/img/accueil.png" alt="accueil mamène">
                    </div>

                    <div class="onFlex">
                        <h2> 
                            Bienvenue sur le site de la Fédération des Etudiants de la Faculté Polytechnique de Mons.
                        </h2>
                    </div>
                    
                </div>
               
               <p>
               La Fédération des Étudiants F.P.Ms est constituée de l'ensemble des étudiants de la Faculté possédant la Carte Fédé. 
               Cette fédération est représentée par la Fédérale et comprend de nombreux Cercles aux activités très variées. 
                </p>
                <p>
                    Nous vous invitons à vous diriger vers leurs pages respectives pour les découvrir.
                </p>
                <p>
                    Bonne visite !
                </p>

Bonne visite !
               </p>
            </article>

    </div>

 	<?php include("./footer.php"); ?>

    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
