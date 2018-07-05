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
	
	$commentaire=htmlspecialchars($_POST['comment']);
	$titre=htmlspecialchars($_POST['titre']);
	$id=$_SESSION['id_utilisateur'];

	$req = $bdd->prepare('INSERT INTO `anecdote` (`texte_anecdote`, `date_publication`, `id_utilisateur`, `titre_anecdote`) VALUES (?,NOW(),?, ?)');
	//INSERT INTO `anecdote` (`id_anecdote`, `texte_anecdote`, `date_publication`, `id_utilisateur`, `titre_anecdote`) VALUES (NULL, 'yoloooooooohahahahahahananananananaoapapapapajdhdhddhdhzzsjxjaia', '2017-12-14 00:00:00', '1', 'Devine quoi ? ');

	$req->execute(array($commentaire,$id,$titre));
}

header('Location:../../pages/livreOr.php');


//$req = $bdd->prepare('INSERT INTO `anecdote` (`id_anecdote`, `texte_anecdote`, `date_publication`, `id_utilisateur`) VALUES (NULL,"yolo3000//", \'2017-12-22\', \'1\'); ');

//$req->execute(array($_POST['pseudo'], $_POST['message']));

?>