<?php
session_start();

include("../model/dao/connexionDAO.php"); 
?>

<?php include("../controller/getConnexionData.php"); ?>

<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="styles/inscription.css" />
    <?php include("./header.php"); ?>
     
</head>
<body>

    <?php include("./navbar.php"); ?>

    <div class = container style="padding-top: 3rem">
        <div class = row>
            <div class = col-md-7 style="padding-top: 6rem;">

                <img src='../resources/img/logoSiteFede.png' alt='Logo du site !' id='logo' />
                <h1>Le site fédé a bien plus que vous ne pensez à vous <br /> offrir !</h1>

            </div>  

            <div class = 'col-md-5 inscription'>
                
            <h2 class="connexionh2">Connexion</h2>

            <p class="connexionp">Accédez à votre compte</p> <br />

            <form class='connexionformulaire' method='post' action=''>    

            <p>
                <input class='connexionchamp' type='text' id='pseudoco'  name='pseudoco' placeholder='Pseudo' maxlength='25' size='45' required />
            </p>

            <p>
                <input class='connexionchamp' type='password' id='passco' name='passco' placeholder='Mot de passe' maxlength='25' size='45' required/>
            </p>

            <p>
                <br />
                <input type='submit' class = 'btn' name='formco' value="Se connecter" />
                <br />
            </p>   

            <?php

            if(isset($erreur))
            {
                echo $erreur;
            }

            ?>

            <br />
            <br />
            <a href='inscription.php' id="lieninscri">Pas encore inscrit ? N'attendez plus !</a>

        </form>

            </div>
        </div>
    </div>

    
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>