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
                <p id="textAccueil"> ACCUEIL          ALTHOUGH Classical Latin did not use articles, the germ of the later system can be seen in remarkably early texts. Thus unus ('one'), besides denoting number, was used as an equivalent of quidam ('a certain') and then as an indeterminate marker. During the early Empire, ille ('that') and ipse ('himself') gradually lost their emphatic value and began to be used as definite articles. From the ninth century, when the first vernacular texts appear, all the Romance languages show a fully developed definite and indefinite article close in form, if not in usage, to that of the modern language. It is interesting to note that because ille had been weakened as a demonstrative it was replaced at an early date by a reinforced ecc-ille or accu-ille which gave the modern forms celui, quello, acel, aquel, aqueu, etc. But why did such a development take place? We may begin to appreciate the change if we consider the article-less style of the headline writer: 'PM backs chancellor' or 'Nun attacks skinheads'. There is no difficulty understanding what is meant here. But if we came across a sentence 'I saw boy on bike' we would feel a need for greater precision; the distinction between the less specific 'a' ('one of the category boy/bike') and the more particular 'the' ('the boy/bike already known or referred to') is of importance to us. To visualise the scene more fully we require that differentiation which use of the articles allows. This desire for greater clarity was increasingly felt during the Late Latin period, as similar developments all over the Romance area show. It must not be forgotten, however, that even today speakers of some European languages show no desire to make those distinctions we think so necessary: Finns and most Slavs get by well enough without any articles, definite or indefinite.</p>

            </article>

    </div>

 	<?php include("./footer.php"); ?>

    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
