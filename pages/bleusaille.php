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
                <div class="articleCenter">
                    <p>Tu as certainement déjà entendu parler de la Bleusaille via un copain qui a fait son baptême ou via les médias. Et bien, tout ce que tu as entendu
                        à propos du baptême à Bruxelles, Liège, Louvain-la-Neuve... tu peux l'oublier. Chez nous, à la Faculté Polytechnique de Mons, nous avons 
                        une Bleusaille qui ne se trouve nulle part ailleurs.</p>
                    <p> La Bleusaille est un excellent moyen d'intégration. Cette année sera la 180ème où celle-ci a lieu, c'est dire si elle a fait 
                    ses preuves. Elle te permettra de tisser très rapidement des liens avec tous ceux qui, comme toi, sont nouveaux, mais aussi avec tous
                     les étudiants baptisés et même avec ceux qui ne sont plus étudiants.</p>
                </div>
                <div class="containerArticle">
                    <div class="divArticle">
                        <p> 
                        La Bleusaille, ce n'est pas que l'intégration, elle te permettra de développer une personnalité forte et épanouie nécessaire durant
                        les études difficiles que tu as choisi d'entreprendre et à l'ingénieur que tu deviendras. Le côté relationnel, qui est tout aussi
                        important pour un ingénieur, n'apparaît dans aucun programme de cours, mais a une grande place dans la Bleusaille.
                        </p>
                    </div>
                    <div class="divArticle">
                        <img class=""src="../resources/img/bleusaille1.jpg" alt="photo bleusaille 179" class="imgArticle" />
                    </div>
                </div>

                

            </article>

    </div>

 	<?php include("./footer.php"); ?>

    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
