<?php
session_start();
//session_start() est obligatoire sur les pages si on veut récupérer les variables de session enregistrées. 
   include("../model/dao/connexionDAO.php"); 

    if(isset($_GET['id_utilisateur']) AND $_GET['id_utilisateur']>0) // On ferme l'accolade à la fin du code
    {
        //On convertit en int ce que l'utilisateur pourrait rentrer dans l'adresse pour être sûr d'avoir qqch de la forme d'un id. 
        $getid = intval($_GET['id_utilisateur']);
        $requser = $bdd -> prepare('SELECT * FROM utilisateur WHERE id_utilisateur=?');
        $requser -> execute(array($getid));
        $userinfo = $requser -> fetch(); // On va chercher les infos pour pouvoir les afficher 


?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>site fede  </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- Optional Bootstrap theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <link rel="stylesheet" href="connexion.css" />
     
</head>
<body>


    <!-- A mettre dans le div pour faire la page de connexion-->
<!--Formulaire d'inscription-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>site fede  </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- Optional Bootstrap theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <link rel="stylesheet" href="styleco.css" />
     
</head>
<body>

    <div class = container_videpro>
    </div>

    <div class = container>
        <div class = row>
            <div class = 'col-lg-3'></div>  

            <div class = 'col-lg-6 profil'>
                
                    <h2>Profil de <?php echo $userinfo['prenom_utilisateur']?></h2> <br /> <br />
                    <p>
                        Pseudo : <?php echo $userinfo['pseudo_utilisateur']; ?>
                        <br /> <br />
                        Prénom : <?php echo $userinfo['prenom_utilisateur']; ?>
                        <br /> <br />
                        Nom : <?php echo $userinfo['nom_utilisateur']; ?>
                        <br /> <br />
                        Date de naissance : <?php echo $userinfo['date_naissance_utilisateur']; ?>
                        <br /> <br />
                        E-mail : <?php echo $userinfo['email_utilisateur']; ?>
                        <br /> <br />
                        Promotion : <?php echo $userinfo['promotion_utilisateur']; ?>
                        <br /> <br />
                        <!--Faudrait ajouter le nombre d'étoiles et le parcours à la fac ainsi que rajouter un isset pour ça et la promo pour ne les afficher que si l'utilisateur en a. #pas oublier les foss, rajouter une photo serait cool aussi -->
                        <?php
                        //Pour afficher un profil plus complet quand un utilisateur est en train de consulter son propre profil
                        if(isset($_SESSION['id_utilisateur']) AND $userinfo['id_utilisateur'] == $_SESSION['id_utilisateur'])
                        {

                        ?>
                            <!-- Faudra mettre un lien pour ça !! -->
                            <a href='edition_profil.php'>Éditer mon profil</a>
                            <a href='deconnexion.php'><span class='deco'>Se déconnecter</span></a>
                        <?php
                        }
                        ?>
                      
                        
                    
                    </p>

                    
            </div>
        </div>
    </div>

    
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php

        }
?>