<?php
/**
 * Created by PhpStorm.
 * User: namah
 * Date: 30/10/17
 * Time: 20:25
 */
session_start();

include("connexionDAO.php");

if(isset($_SESSION['id_utilisateur'])) {
    $commentaire = htmlspecialchars($_POST['texte_commentaireAnecdote']);

    $id = $_SESSION['id_utilisateur'];
    $req = $bdd->prepare('INSERT INTO `commentaireAnecdote`(`texte_CommentaireAnecdote`,id_Anecdote, `date_commentaireAnecdote`, `id_utilisateur`) VALUES (?,?,NOW(),?)');
    //INSERT INTO `anecdote` (`id_anecdote`, `texte_anecdote`, `date_publication`, `id_utilisateur`, `titre_anecdote`) VALUES (NULL, 'yoloooooooohahahahahahananananananaoapapapapajdhdhddhdhzzsjxja,ia', '2017-12-14 00:00:00', '1', 'Devine quoi ? ');

    $req->execute(array($commentaire,$_GET['idAnecd'] ,$id));
}

header('Location:../../pages/LivreOrCommentaire.php?idCom='.$_GET['idAnecd']);


//$req = $bdd->prepare('INSERT INTO `anecdote` (`id_anecdote`, `texte_anecdote`, `date_publication`, `id_utilisateur`) VALUES (NULL,"yolo3000//", \'2017-12-22\', \'1\'); ');

//$req->execute(array($_POST['pseudo'], $_POST['message']));

?>