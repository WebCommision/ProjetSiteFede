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

	<div class = container_vide>
	</div>

	<div class = container>
		<div class = row>
			<div class = col-lg-7>
				 <img src='../img/logo.png' alt='Logo du site !' id='logo' />
				<h1>Le site fédé a bien plus que vous ne pensez à vous <br /> offrir !</h1>
			</div>	

			<div class = 'col-lg-5 inscription'>
				
					<h2>Inscription gratuite </h2>
					<p class='soustitre'>et améliorez votre expérience</p> <br />
					<form class='formulaire' method='post' action=''>
						
						<p>
							<input class='champ' type='text' id='prenom_utilisateur'  name='prenom_utilisateur' placeholder='Prénom' maxlength='25' size='45' required />
						</p>
						<p>
							<input class='champ' type='text' id='nom_utilisateur' name='nom_utilisateur' placeholder='Nom' maxlength='25' size='45' required />
						</p>
						<p>
							Date de naissance : <input class='champ' type='date' id='date_naissance_utilisateur' name='date_naissance_utilisateur' maxlength='25' size='45' required />
						</p>
						<p>
							<input class='champ' type='email' id='email_utilisateur' name='email_utilisateur' placeholder='Adresse mail' maxlength='45' size='45' required />
						</p>
						<p>
							<input class='champ' type='email' id='email' name='email' placeholder="Confirmation de l'adresse mail" maxlength='45' size='45' required />
						</p>
						<p>
							Promotion : <input class='champ' id='promotion_utilisateur' type='number' name='promotion_utilisateur' placeholder='Ex : 176' maxlength='25' size='45' />
						</p>
						<p>
							<input class='champ' type='text' id='pseudo_utilisateur' name='pseudo_utilisateur' placeholder='Pseudo' maxlength='25' size='45'  required />
						</p>
						<p>
							<input class='champ' type='password' id='password_utilisateur' name='password_utilisateur' placeholder='Mot de passe' minlength="6" maxlength='25' size='45' required />
						</p>
						<p>
							<input class='champ' type='password' id='password' name='password' placeholder='Confirmation du mot de passe' minlength='6' maxlength='25' size='45' required />
						</p>
						<p>
							S'abonner à la newsletter ? 
							<input type="radio" id='spam_utilisateur' name='spam_utilisateur' value='1' id='oui' required /><label for='1'> Oui </label>
							<input type="radio" id='spam_utilisateur' name='spam_utilisateur' value='0' id='non' required /><label for='0'> Non </label>
						</p>
						<p>
							<input type='submit' class='btn' name='forminscription' value="S'inscrire" />
							<br />
						</p>
					</form>
					<?php 
					//connexion à la BDD
					try
					{
						$bdd = new PDO('mysql:host=localhost;dbname=sitefedefpms;charset=utf8', 'root', '');
					}
					catch(Exception $e)
					{
					        die('Erreur : '.$e->getMessage());
					}

					//Vérification des données 
					if(isset($_POST['forminscription']))
					{
						//htmlspecialchars : pour que l'utilisateur n'entre pas de la merde
						$prenom = htmlspecialchars($_POST['prenom_utilisateur']);
						$nom = htmlspecialchars($_POST['nom_utilisateur']);
						$date = htmlspecialchars($_POST['date_naissance_utilisateur']);
						$mail = htmlspecialchars($_POST['email_utilisateur']);
						$mail2 = htmlspecialchars($_POST['email']);
						$pseudo = htmlspecialchars($_POST['pseudo_utilisateur']); 
						$mdp = sha1($_POST['password_utilisateur']);
						$mdp2 = sha1($_POST['password']);
						$spam = $_POST['spam_utilisateur'];
						
						if(!empty($_POST['prenom_utilisateur']) AND !empty($_POST['nom_utilisateur']) AND !empty($_POST['date_naissance_utilisateur']) AND !empty($_POST['email_utilisateur']) AND !empty($_POST['email']) AND !empty($_POST['pseudo_utilisateur']) AND !empty($_POST['password_utilisateur']) AND !empty($_POST['password']) AND !empty($_POST['spam_utilisateur']))
						{	
							// Si les champs rentrés sont ok, les afficher
							//if(isset($prenom) AND )
							//Vérification adresse mail 
							if($mail == $mail2)
							{
								if(filter_var($mail,FILTER_VALIDATE_EMAIL))
								{
									//On vérifie si le mail existe déjà : 
									$reqmail = $bdd -> prepare('SELECT * FROM utilisateur WHERE email_utilisateur = ?');
									$reqmail -> execute(array($mail));
									//On compte le nombre de colonnes contenant le même mail :
									$mailexist = $reqmail->rowCount();
									if($mailexist == 0)
									{
										//On fait le même avec le pseudo
										$reqpseudo = $bdd -> prepare('SELECT * FROM utilisateur WHERE pseudo_utilisateur=?');
										$reqpseudo -> execute(array($pseudo));
										$pseudoexist = $reqpseudo -> rowCount();
										if($pseudoexist == 0)
										{
											if($mdp == $mdp2)
											{
												//Pour rentrer les données dans la BDD et les afficher
												$req = $bdd -> prepare('INSERT INTO utilisateur(prenom_utilisateur,nom_utilisateur, date_naissance_utilisateur, email_utilisateur, pseudo_utilisateur, password_utilisateur, spam_utilisateur) VALUES(?,?,?,?,?,?,?)');
												$req->execute(array($prenom,$nom,$date,$mail,$pseudo,$mdp,$spam));
												//On crée une variable de session 
												$_SESSION['comptecree'] = '<p class="reussi">Votre compte a bien été créé !</p>'; 
												?>
												<a href="connexion.php">Me connecter</a>
												<?php
												//On redirige sur l'accueil
												// header('Location: accueil.php'); /!\ il faudra changer avec la bonne page ! Ca redirige un utilisateur sur une autre page. 
											}
											else
											{
												echo '<p class="erreur">Vos mots de passe ne correspondent pas !</p>';
											}
										}
										else
										{
										echo '<p class="erreur">Ce pseudo est déjà utilisée !</p>';
										}
									}
									else
									{
										echo '<p class="erreur">Cette adresse mail est déjà utilisée !</p>';
									}
								}
								else
								{
									echo '<p class="erreur">L\'adresse mail est invalide.</p>';
								}	
							}
							else
							{
								echo '<p class="erreur">Vos adresses mail ne correspondent pas !</p>';
							}
						}
					}
	?>


			</div>
		</div>
	</div>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>