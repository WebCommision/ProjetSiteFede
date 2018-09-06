<?php
session_start();
//session_start() est obligatoire sur les pages si on veut récupérer les variables de session enregistrées. 

include("../model/dao/connexionDAO.php");
include("../controller/getConnexionData.php");

    if(isset($_GET['id_utilisateur']) AND $_GET['id_utilisateur']>0) // On ferme l'accolade à la fin du code
    {
        //On convertit en int ce que l'utilisateur pourrait rentrer dans l'adresse pour être sûr d'avoir qqch de la forme d'un id. 
        $getid = intval($_GET['id_utilisateur']);
        $requser = $bdd -> prepare('SELECT * FROM utilisateur WHERE id_utilisateur=?');
        $requser -> execute(array($getid));
        $userinfo = $requser -> fetch(); // On va chercher les infos pour pouvoir les afficher 


?>
<!DOCTYPE html>
<html>
<head>

    <?php include("./header.php"); ?>
    <link rel="stylesheet" href="styles/inscription.css" />


</head>
<body>

    <?php include("./navbar.php"); ?>

    <?php include ("../controller/warningPopup.php");?>


    <div class="backgroundOverlay" style="display: none;" id="backgroundOverlay2">

        <div class="warningpopup" id="popup2">

            <h2 class="connexionh2" style="color: red;">WARNING</h2>

            <p class="connexionp">Voulez-vous vraiment supprimer votre compte? <br> Il sera irrécupérable!</p> <br />

            <div align="center"> <a href="../model/dao/deleteUtilisateurDAO.php" class="gras btn btn-danger btn-xl"> <span class="glyphicon glyphicon-warning"></span> Valider</a> </div>

        </div>

    </div>

    <div class = container style="padding-top: 3rem">
        <div class = row>
            <div class = 'col-lg-3'></div>  

            <div class = 'col-lg-6 profil'>
                
                <h2>Profil de <?php echo $userinfo['prenom_utilisateur']?></h2> <br /> <br />

                <div class = 'col-lg-6'>

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
                    
                </p>
    
    			</div>

                <div class = 'col-lg-6'>

                	<?php
                    /*try{
					    echo "<img src='../resources/photos/utilisateur/".$userinfo['photo_utilisateur']."' >";
                    }catch(Exception $e)
                    {*/
                        echo " <p> pas de photo pour le moment, tkt ça arrivera bien un jour </p> ";
                    //}
                	?>

                	<h5 style="color: white">Carrière : <br></h5>

                	<?php

                	include ("../model/dao/utilisateurDAO.php");


		    		$carriereArray=selectCarriere($bdd,$userinfo["id_utilisateur"]);	

		    		?>
		    	
		    		<ul style="list-style-type: none; padding-left: 3rem;">

			    		<?php

			                foreach ($carriereArray as list ($nom_poste,$promotion_comite,$nom_cercle)) {

			                	?><li> <?php echo "$promotion_comite \n $nom_poste \n $nom_cercle";?> </span>
			                		 
								</li> 

								<?php
			                	
			                }

			            ?> 

                </div>

                <div class = 'col-lg-12'>

	                <p>

	                	<?php
	                    //Pour afficher un profil plus complet quand un utilisateur est en train de consulter son propre profil
	                    if(isset($_SESSION['id_utilisateur']) AND $userinfo['id_utilisateur'] == $_SESSION['id_utilisateur'])
	                    {

	                    ?>

	                    <ul style="list-style-type: none; padding-left: 0rem;">
	  
	                        <li class="networkBarElement" > <a href='profil_edition.php'>Éditer mon profil </a> </li>
	                        <li class="networkBarElement" > <a href='deconnexion.php'><span class='deco'> Se déconnecter </span></a>  </li>
	                        <li class="networkBarElement" > <a href="#" onclick="showWarning('backgroundOverlay2','popup2')" id="openOverlay2"><span class='deco'> Supprimer mon compte</span></a></li>

	                    </ul>

	                    <?php
	                    }
	                     ?>

	                </p>

	            </div>
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