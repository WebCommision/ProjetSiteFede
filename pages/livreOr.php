
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

    <div class="container">

        <div class="row">
        
            <div class="col-xs-12"  style="padding-left: 3rem;padding-right: 3rem;">
                <h1>Site fédé: Livre d'Or</h1>
                <h2> Bienvenue sur le livre d'or officiel du site fédé.</h2>

                <div class ='entreCom'>
                    <h2> <strong> Entrez votre annecdote! </strong> </h2>
                    <br/>

                    <?php
                        if(isset($_SESSION['id_utilisateur']))
                        {

                            echo
                            '
                            <form class="postForm" method="post" action="../model/dao/livreOrAddAnecdote.php">
                                <input type="text" class="form-control" name="titre" id="titre" placeholder="Entrez votre titre" required />
                                <textarea class="form-control" rows="4" name="comment" id="comment" placeholder="Entrez votre anecdote" required></textarea>
                                <br/>
                                <input type="submit" class="LivreOr_submitButton btn btn-danger" name="forminscription" value="Envoyer" required/>
                            </form>
                            ';

                        }
                        else{
                            echo'<h3>Envie de prendre part à ce livre d\'or? <a href="connexion.php"> Connectez-vous!</a> </h3>';
                        }

                    ?>





                    <?php


                    $reponses=$bdd->query('
                        SELECT anecdote.id_utilisateur,id_anecdote,nom_utilisateur,texte_anecdote,titre_anecdote,date_publication 
                        FROM anecdote JOIN utilisateur ON anecdote.id_utilisateur=utilisateur.id_utilisateur ORDER BY id_anecdote DESC');
                    $count=1;
                    while($reponse=$reponses->fetch())
                    {
                        echo '
                            <div class="LivreOr_commentaire">
                                <h3 ><a href="LivreOrCommentaire.php?idCom='.$reponse['id_anecdote'].'"><strong>'.$count.') '.$reponse['titre_anecdote'].'</strong> </a></h3>
                                <p>'.$reponse['texte_anecdote'].'</p>
                                <div class="row container">
                                    
                                    <div class="col-sm-11">                             
                                         <h6> <a>'.$reponse['nom_utilisateur'].'</a> a publié cette annecdote.  '.$reponse['date_publication'].'</h6>
                                    </div>
                                </div>
                            </div>
                        ';
                        $count++;
                        if(isset($_SESSION['id_utilisateur']))
                        { 
                            echo'
                                <div class="row">
                                    <div class="col-sm-3">
                                        <a>j\'aime</a>
                                    </div>

                                    <div class="col-sm-3">
                                        <a href="LivreOrCommentaire.php?idCom='.$reponse['id_anecdote'].'">commenter</a>
                                    </div>
               
                                ' ;

                            if($_SESSION['id_utilisateur']==$reponse['id_utilisateur'])
                            {
                                echo'
                        
                                    <div class="col-sm-3">
                                        <a href ="../model/dao/livreOrDeleteAnecdote.php?id='.$reponse['id_anecdote'].'">supprimer</a>
                                    </div>
                                </div>    
                                        
                                ' ;
                            }else{echo' </div>   ';}
                        }


                    }

                    $reponses->closeCursor();

                    ?>



                </div>
            </div>
        </div>

    </div>

    <?php include("./footer.php"); ?>




</body>
</html>