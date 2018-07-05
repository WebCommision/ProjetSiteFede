<?php
session_start();
?>

<?php include("../model/dao/connexionDAO.php"); ?>
<?php include("../controller/getConnexionData.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Livre d'Or:commentaire</title>
    <?php include("./header.php"); ?>
    
</head>
<body>

    <?php include("./navbar.php"); ?>

    <div class="container">
        
        <div class="row">
           
            <div class="col-xs-12" style="padding-left: 3rem;padding-right: 3rem;">
                <h1 > Commentaires</h1>

                <div class ='entreCom'>
                    <p
                    <br/>
                    <?php
                    $commentaire=$bdd->query('SELECT id_anecdote,texte_anecdote, titre_anecdote FROM anecdote WHERE id_anecdote = '.$_GET['idCom'].' ');
                    while($com=$commentaire->fetch())
                    {
                        echo '
                            <h2><strong>'.$com['titre_anecdote'].'</strong></h2>
                            <p> '.$com['texte_anecdote'].'</p>
                            ';
                        $idAne=$com['id_anecdote'];
                    }

                    if(isset($_SESSION['id_utilisateur']))
                    {
                        echo
                        '
                            <form class="postForm" method="post" action="../model/dao/livreOrAddComment.php?idAnecd='.$idAne.'">
                            <div class="row container">
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="texte_commentaireAnecdote" id="comment" placeholder="Entrez votre commentaire" required />
                                </div>    
                                <div class="col-sm-2">
                                    <input type="submit" class="LivreOr_submitButton btn btn-danger" name="forminscription" value="Envoyer" required/>
                                </div>
                            </div>
                            </form>
                            ';

                    }
                    else{
                        echo'<h4>Envie de prendre part à ce livre d\'or? <a href="connexion.php"> Connectez-vous!</a> </h4>';
                    }

                    ?>
                    <!-- liste de commentaire-->
                    <?php


                    $liste=$bdd->query('SELECT id_commentaireAnecdote ,nom_utilisateur,commentaireAnecdote.id_utilisateur,texte_commentaireAnecdote,date_commentaireAnecdote FROM commentaireAnecdote JOIN utilisateur ON commentaireAnecdote.id_utilisateur=utilisateur.id_utilisateur WHERE id_anecdote='.$_GET['idCom'].' ORDER BY id_commentaireAnecdote DESC
    ');
                    while($com=$liste->fetch())
                    {
                        echo '<div class="LivreOr_commentaireAnecdote">
                                <!--p>'.$com['texte_commentaireAnecdote'].'</p-->
                                <div class="row container">
                                    <div class="col-sm-11">
                                         <p> <a>'.$com['nom_utilisateur'].'</a>: '.$com['texte_commentaireAnecdote'].' <br/> '.$com['date_commentaireAnecdote'].'</p>
                                    </div>
                                </div>
                            
                        ';
                        
                        if(isset($_SESSION['id_utilisateur']))
                        {
                            if($_SESSION['id_utilisateur']=$com['id_utilisateur'])
                            {
                                echo'
                                     <div class="col-sm-3">
                                         <a href ="../model/dao/livreOrDeleteComment.php?id='.$com['id_commentaireAnecdote'].'">supprimer</a>
                                     </div>

                                ' ;
                            }
                        }
                        echo '</div>';

                    }

                    $liste->closeCursor();

                    ?>





                </div>
            </div>
        </div>
    </div>
    <?php include("./footer.php"); ?>
</body>
</html>


