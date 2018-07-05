<?php
session_start();
//session_start() est obligatoire sur les pages si on veut récupérer les variables de session enregistrées. 
    try 
    {
        $bdd = new PDO('mysql:host=localhost;dbname=sitefedefpms;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    if(isset($_SESSION['id_utilisateur'])) // On ferme l'accolade à la fin du code
    {
        $requser = $bdd->prepare('SELECT * FROM utilisateur WHERE id_utilisateur = ?');
        $requser -> execute(array($_SESSION['id_utilisateur']));
        $user = $requser->fetch();

        //Modification du prenom 
        if(isset($_POST['new_prenom_utilisateur']) AND !empty($_POST['new_prenom_utilisateur']) AND $_POST['new_prenom_utilisateur'] != $user['prenom_utilisateur'])
        {
            $newprenom = htmlspecialchars($_POST['new_prenom_utilisateur']);
            $insertprenom = $bdd -> prepare('UPDATE utilisateur SET prenom_utilisateur = ? WHERE id_utilisateur = ?');
            //Il faut précider l'id sinon ça mettra à jour tous les pseudos de la bdd
            $insertprenom -> execute(array($newprenom, $_SESSION['id_utilisateur']));
            header('Location: profil.php?id_utilisateur='.$_SESSION['id_utilisateur']);
        }

        //Modification du nom
        if(isset($_POST['new_nom_utilisateur']) AND !empty($_POST['new_nom_utilisateur']) AND $_POST['new_nom_utilisateur'] != $user['nom_utilisateur'])
        {
            $newnom = htmlspecialchars($_POST['new_nom_utilisateur']);
            $insertnom = $bdd -> prepare('UPDATE utilisateur SET nom_utilisateur = ? WHERE id_utilisateur = ?');
            $insertnom -> execute(array($newnom, $_SESSION['id_utilisateur']));
            header('Location: profil.php?id_utilisateur='.$_SESSION['id_utilisateur']);
        }

        //Modification de la date de naissance
        if(isset($_POST['new_date_utilisateur']) AND !empty($_POST['new_date_utilisateur']) AND $_POST['new_date_utilisateur'] != $user['date_naissance_utilisateur'])
        {
            $newdate = htmlspecialchars($_POST['new_date_utilisateur']);
            $insertdate = $bdd -> prepare('UPDATE utilisateur SET date_naissance_utilisateur = ? WHERE id_utilisateur = ?');
            $insertdate -> execute(array($newdate, $_SESSION['id_utilisateur']));
            header('Location: profil.php?id_utilisateur='.$_SESSION['id_utilisateur']);
        }

        //Modification de l'adresse mail
        if(isset($_POST['new_email1']) AND !empty($_POST['new_email1']) AND isset($_POST['new_email2']) AND !empty($_POST['new_email2']) AND $_POST['new_email1'] != $user['email_utilisateur'])
        {
            $email1 = htmlspecialchars($_POST['new_email1']);
            $email2 = htmlspecialchars($_POST['new_email2']);

            if($email1 == $email2)
            {
                if(filter_var($email1,FILTER_VALIDATE_EMAIL))
                {
                    //On vérifie si le mail existe déjà : 
                    $reqmail = $bdd -> prepare('SELECT * FROM utilisateur WHERE email_utilisateur = ?');
                    $reqmail -> execute(array($email1));
                    //On compte le nombre de colonnes contenant le même mail :
                    $mailexist = $reqmail->rowCount();

                    if($mailexist == 0)
                    {
                        $insertemail = $bdd -> prepare('UPDATE utilisateur SET email_utilisateur = ? WHERE id_utilisateur = ?');
                        $insertemail -> execute(array($email1, $_SESSION['id_utilisateur']));
                        header('Location: profil.php?id_utilisateur='.$_SESSION['id_utilisateur']);
                    }
                    else
                    {
                        $erreur2 =  '<p class="erreur">Cette adresse mail est déjà utilisée !</p>';
                    }
                }
                else
                {
                    $erreur2 = '<p class="erreur">L\'adresse mail est invalide.</p>';
                }   
            }
            else
            {
                $erreur2 = '<p class="erreur">Vos adresses mails ne correspondent pas ! </p>';
            }
        }

        //Modification de la promotion
        if(isset($_POST['new_promo_utilisateur']) AND !empty($_POST['new_promo_utilisateur']) AND $_POST['new_promo_utilisateur'] != $user['promotion_utilisateur'])
        {
            $newpromo = htmlspecialchars($_POST['new_promo_utilisateur']);
            $insertpromo = $bdd -> prepare('UPDATE utilisateur SET promotion_utilisateur = ? WHERE id_utilisateur = ?');
            $insertpromo -> execute(array($newpromo, $_SESSION['id_utilisateur']));
            header('Location: profil.php?id_utilisateur='.$_SESSION['id_utilisateur']);
        }

        //Modification du pseudo
        if(isset($_POST['new_pseudo_utilisateur']) AND !empty($_POST['new_pseudo_utilisateur']) AND $_POST['new_pseudo_utilisateur'] != $user['pseudo_utilisateur'])
        {   $newpseudo = htmlspecialchars($_POST['new_pseudo_utilisateur']);
            $reqpseudo = $bdd -> prepare('SELECT * FROM utilisateur WHERE pseudo_utilisateur=?');
            $reqpseudo -> execute(array($newpseudo));
            $pseudoexist = $reqpseudo -> rowCount();
            if($pseudoexist == 0)
            {
                
                $insertpseudo = $bdd -> prepare('UPDATE utilisateur SET pseudo_utilisateur = ? WHERE id_utilisateur = ?');
                $insertpseudo -> execute(array($newpseudo, $_SESSION['id_utilisateur']));
                header('Location: profil.php?id_utilisateur='.$_SESSION['id_utilisateur']);
            }
            else
            {
                $erreur3 =  '<p class="erreur">Ce pseudo est déjà utilisé !</p>';
            }

        }

        //Modification du mot de passe
        if(isset($_POST['new_mdp1']) AND !empty($_POST['new_mdp1']) AND isset($_POST['new_mdp2']) AND !empty($_POST['new_mdp2']))
        {
            $mdp1 = sha1($_POST['new_mdp1']);
            $mdp2 = sha1($_POST['new_mdp2']);

            if($mdp1 == $mdp2)
            {
                $insertmdp = $bdd -> prepare('UPDATE utilisateur SET password_utilisateur = ? WHERE id_utilisateur = ?');
                $insertmdp -> execute(array($nmdp1, $_SESSION['id_utilisateur']));
                header('Location: profil.php?id_utilisateur='.$_SESSION['id_utilisateur']);
            }
            else
            {
                $erreur = '<p class="erreur">Vos mots de passe ne correspondent pas ! </p>';
            }
        }

        //Modification du spam
        if(isset($_POST['new_spam_utilisateur']) AND !empty($_POST['new_spam_utilisateur']) AND $_POST['new_spam_utilisateur'] != $user['spam_utilisateur'])
        {
            $newspam = htmlspecialchars($_POST['new_spam_utilisateur']);
            $insertspam = $bdd -> prepare('UPDATE utilisateur SET spam_utilisateur = ? WHERE id_utilisateur = ?');
            $insertspam -> execute(array($newnom, $_SESSION['id_utilisateur']));
            header('Location: profil.php?id_utilisateur='.$_SESSION['id_utilisateur']);
        }

        if(isset($_POST['new_prenom_utilisateur']) AND $_POST['new_prenom_utilisateur'] == $user['prenom_utilisateur'])
        {
            header('Location: profil.php?id_utilisateur='.$_SESSION['id_utilisateur']);
        }
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
                
                    <h2>Édition du profil</h2> <br /> <br />
                    <form  method='post' action=''>
                        
                        <p>
                            <label>Prénom : </label>
                            <input class='champ' type='text' id='new_prenom_utilisateur'  name='new_prenom_utilisateur' placeholder='Prénom' maxlength='25' size='45' value='<?php echo $user['prenom_utilisateur'];?>'/>
                        </p>
                        <p>
                            <label>Nom : </label>
                            <input class='champ' type='text' id='new_nom_utilisateur' name='new_nom_utilisateur' placeholder='Nom' maxlength='25' size='45' value='<?php echo $user['nom_utilisateur'];?>' />
                        </p>
                        <p>
                            <label>Date de naissance : </label>
                            <input class='champ' type='date' id='new_date_utilisateur' name='new_date_utilisateur' maxlength='25' size='45' value='<?php echo $user['date_naissance_utilisateur'];?>' />
                        </p>
                        <p>
                            <label>Adresse mail : </label>
                            <input class='champ' type='email' id='new_email1' name='new_email1' placeholder='Adresse mail' maxlength='45' size='45' value='<?php echo $user['email_utilisateur'];?>' />
                        </p>
                        <p>
                            <label>Confirmation de l'adresse mail : </label>
                            <input class='champ' type='email' id='new_email2' name='new_email2' placeholder="Confirmation de l'adresse mail" maxlength='45' size='45' value='<?php echo $user['email_utilisateur'];?>' />
                        </p>
                        <p>
                            <label>Promotion : </label>
                            <input class='champ' id='new_promo_utilisateur' type='number' name='new_promo_utilisateur' placeholder='Ex : 176' maxlength='25' size='45' value='<?php echo $user['promotion_utilisateur'];?>' />
                        </p>
                        <p>
                            <label>Pseudo : </label>
                            <input class='champ' type='text' id='new_pseudo_utilisateur' name='new_pseudo_utilisateur' placeholder='Pseudo' maxlength='25' size='45' value='<?php echo $user['pseudo_utilisateur'];?>' />
                        </p>
                        <p>
                            <label>Mot de passe : </label>
                            <input class='champ' type='password' id='new_mdp1' name='new_mdp1' placeholder='Mot de passe' minlength="6" maxlength='25' size='45' />
                            <!-- On ne met pas de value pour le mot de passe sinon ça affiche le mot de passe haché malgré le type password. -->
                        </p>
                        <p>
                            <label>Confirmation du mot de passe : </label>
                            <input class='champ' type='password' id='new_mdp2' name='new_mdp2' placeholder='Confirmation du mot de passe' minlength='6' maxlength='25' size='45'/>
                        </p>
                        <p>
                            <label>S'abonner à la newsletter ? </label>
                            <input type="radio" id='new_spam_utilisateur' name='new_spam_utilisateur' value='1' id='oui'/><label for='1'> Oui </label>
                            <input type="radio" id='new_spam_utilisateur' name='new_spam_utilisateur' value='0' id='non'/><label for='0'> Non </label>
                            <br />
                        </p>
                        <p>
                            <input type='submit' class='btn' name='forminscription' value="Éditer mon profil" />
                            <br />
                        </p>
                    </form>
                    <?php
                    if(isset($erreur))
                    {
                        echo $erreur;
                    }

                    if(isset($erreur2))
                    {
                        echo $erreur2;
                    }

                    if(isset($erreur3))
                    {
                        echo $erreur3;
                    }
                    ?>

                    

            </div>
        </div>
    </div>

    
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php

        }
        else
        {
            header('Location: connexion.php');
        }
?>