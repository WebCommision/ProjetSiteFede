<?php 

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
            //header("location: accueil.php");
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