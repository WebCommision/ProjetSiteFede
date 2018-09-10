<?php
/**
 * Created by PhpStorm.
 * User: namah
 * Date: 27/12/17
 * Time: 16:55
 */
session_start();
include("connexionDAO.php");

//Les deux lignes ci-dessous permettent d'éviter que l'emploie de la méthode Get ne mette en péril notre sécurité
//En effet, Si un utilisateur déconnecté entrait à la fin du site: livreOrDeleteComment?id=(l'id qu'il désire supprimé')
//Il était capable de le faire sans qu'il en soit l'auteur.
//
$reponse=$bdd->query('SELECT id_utilisateur FROM anecdote WHERE id_anecdote = '.$_GET['id'].' ');
//$rep=$reponse->execute(array($_GET['id']));
if(isset($_SESSION['id_utilisateur']))
{
    echo'session Ok';
    //echo $_SESSION['id_utilisateur'];
    while ($donnees = $reponse->fetch()) {
        if ($_SESSION['id_utilisateur'] == $donnees['id_utilisateur']) {
            echo 'debut delete';

            $delCom = $bdd->prepare('DELETE FROM commentaireAnecdote WHERE commentaireAnecdote.id_anecdote = ?');
            $delCom->execute(array($_GET['id']));
            $req = $bdd->prepare('DELETE FROM `anecdote` WHERE `anecdote`.`id_anecdote` = ?');
            $req->execute(array($_GET['id']));


        } else {
            echo $_SESSION['id_utilisateur'];
            echo '/';
            echo $donnees['id_utilisateur'];
        }
    }
}


header('Location:../../pages/livreOr.php');


?>