<?php
session_start();
                    
include ("../model/dao/connexionDAO.php");

if(isset($_POST['formco'])){
    $pseudoco = htmlspecialchars($_POST['pseudoco']);
    $passco = sha1($_POST['passco']);

    if(!empty($pseudoco) AND !empty($passco)){

        $requser = $bdd -> prepare('SELECT * FROM utilisateur WHERE pseudo_utilisateur = ? AND password_utilisateur = ?');
        $requser -> execute(array($pseudoco, $passco));
        $userexist = $requser->rowCount();

        if($userexist==1){
                              
            $userinfo = $requser ->fetch();                                     
            //On enregistre les variables de session
            $_SESSION['id_utilisateur'] = $userinfo['id_utilisateur'];
            $_SESSION['pseudo_utilisateur'] = $userinfo['pseudo_utilisateur'];
            $_SESSION['password_utilisateur'] = $userinfo['password_utilisateur'];
            $_SESSION['nom_utilisateur'] = $userinfo['nom_utilisateur'];
            $_SESSION['prenom_utilisateur'] = $userinfo['prenom_utilisateur'];
            $_SESSION['premium_utilisateur'] = $userinfo['premium_utilisateur'];
            $_SESSION['date_naissance_utilisateur'] = $userinfo['date_naissance_utilisateur'];
            $_SESSION['email_utilisateur'] = $userinfo['email_utilisateur'];
            $_SESSION['spam_utilisateur'] = $userinfo['spam_utilisateur'];
            $_SESSION['promotion_utilisateur'] = $userinfo['promotion_utilisateur'];
            //On redirige l'utilisateur soit sur son profil, soit sur l'accueil
            // Sur son profil, on transite par l'id : 
            header("Location: profil.php?id_utilisateur=".$_SESSION['id_utilisateur']);

        }
        else
        {
            $erreur = '<p class="erreur">Identifiant ou mot de passe incorrect !</p>';
        }
    }
    else 
    {
        $erreur = '<p class="erreur">Tous les champs doivent être remplis !</p>';
    }

}

?>

<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="styles/inscription.css" />
    <?php include("./header.php"); ?>
     
</head>
<body>

    <div class = container_vide>
    </div>

    <div class = container>
        <div class = row>
            <div class = col-lg-7>
                 <img src='../img/logo.png' alt='Logo du site !' id='logo' />
                <h1>Le site fédé a bien plus que vous ne pensez à vous <br /> offrir !</h1>
            </div>  

            <div class = 'col-lg-5 inscription'>
                
                    <h2>Connexion</h2>
                    <p class='soustitre'>Accédez à votre compte</p> <br />
                    <form class='formulaire' method='post' action=''>    
                         <p>
                             <input class='champ' type='text' id='pseudoco'  name='pseudoco' placeholder='Pseudo' maxlength='25' size='45' required />
                        </p>
                        <p>
                            <input class='champ' type='password' id='passco' name='passco' placeholder='Mot de passe' maxlength='25' size='45' required/>
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
                        <a href='inscription.php' id="lieninscri">Pas encore inscrit ? N'attendez plus !</a>
                    </form>
                 

                    
            </div>
        </div>
    </div>

    
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>