
<div class="container networkBar hidden-xs">
  
    <ul style="list-style-type: none; padding-left: 0rem;">
      
        <li style="font-weight: bold; float: left; padding-right: 2rem;" >Polytech NETWORK  </li>
        <li class="networkBarElement" > <a class="networkBarAnchor" target="_blank" href="https://www.facebook.com/groups/12209585370/"> Facebook</a>  </li>
        <li class="networkBarElement" > <a class="networkBarAnchor" target="_blank" href="http://portail.umons.ac.be/FR/Pages/default.aspx"> UMons</a>  </li>
        <li class="networkBarElement" > <a class="networkBarAnchor" target="_blank" href="http://www.the-games.be/"> The-Games</a></li>

    </ul>

</div>

<!-- javascriptw pour le bouton connexion, faire apparaitre et disparaitre le div-->
<?php include ("../controller/connexionPopup.php");?>

<div class="backgroundOverlay" style="display: none;" id="backgroundOverlay">

    <div class="popup" id="popup">

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

<div class="container"  style="background-color: #1B1B1B; margin-bottom: 2rem;">
    <nav class="navbar navbar-inverse">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="./accueil.php" class="navbar-brand">
                <img src="../resources/img/logoSiteFede.png"   class="d-inline-block align-top" alt="logo site fédé" width="140" height=""/>
            </a>
        </div>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
           
            <form  class="navbar-form navbar-left" id="navbarsearchform" >
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search..." type="text">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-default btnsearch"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                </div>
            </form>
             <ul class="nav navbar-nav navbar-right">
      
                

                <?php 

                    if(isset($_SESSION['id_utilisateur'])){ // On ferme l'accolade à la fin du code

                        echo '<li><a href="deconnexion.php"> <span class="glyphicon glyphicon-log-out"></span> Déconnexion</a></li>';
                        
                        ?><li><a href="profil.php?id_utilisateur= <?php echo $_SESSION["id_utilisateur"]; ?> "> <span class="glyphicon glyphicon-user" ></span> Profil</a></li> <?php
                    }
                             
                    else{

                        echo '<li><a href="#"  id="openOverlay"> <span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>';

                        echo '<li><a href="inscription.php"><span class="glyphicon glyphicon-pencil" ></span> Inscription</a></li>';
                    }

                ?>

                
            </ul>
        </div>
    </nav>



    <div class="container menu">
      <div class="row">
        <div class="col-sm-12">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a href="accueil.php" class="nav-link"><i class="glyphicon glyphicon-home"></i>&nbsp;Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cercles.php"><i class="glyphicon glyphicon-leaf"></i>&nbsp;Cercles</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="chants.php"><i class="glyphicon glyphicon-music"></i>&nbsp;Chants</a>
            </li>
            <!--li class="nav-item">
              <a class="nav-link" href="livreOr.php"><i class="glyphicon glyphicon-book"></i>&nbsp;Livre d'or</a>   
            </li-->
            <li class="nav-item">
              <a class="nav-link" href="sites.php"><i class="glyphicon glyphicon-education"></i>&nbsp;Sites utiles</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="bleusaille.php"><i class="glyphicon glyphicon-education"></i>&nbsp;Bleusaille</a>
            </li>
            <?php 

            if(isset($_SESSION['id_utilisateur']))
            {

                echo '<li class="nav-item">
                  <a class="nav-link" href="moderation.php"><i class="glyphicon glyphicon-education"></i>&nbsp;Espace Moderateur</a>
                </li>';

            }
            
            ?>

          </ul>
        </div>
      </div>
    </div>
 
</div>