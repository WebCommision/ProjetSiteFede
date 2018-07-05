<!--Formulaire d'inscription-->
<?php
session_start();
?>

<?php include("../model/dao/connexionDAO.php"); ?>
<?php include("../controller/getConnexionData.php"); ?>

<!DOCTYPE html>
<html>
<head>

  
    <?php include("./header.php"); ?>
    <link rel="stylesheet" href="styles/inscription.css" />
     
</head>
<body>

	<?php include ("navbar.php") ?>

	<div class = container style="padding-top: 3rem">
		<div class = row >
			<div class = "col-md-7">

				<div class="col-md-10 hidden-xs" style="padding-top: 6rem;">

					<img class="logo" src='../resources/img/logoSiteFede.png' alt='Logo du site !'/>
					<h1 class="slogan">Le site fédé a bien plus que vous ne pensez à vous <br /> offrir !</h1>

				</div>
			</div>	

			<div class = 'col-md-5 inscription'>
				
					<h2>Inscrivez-vous gratuitement</h2>
					<p class='soustitre'>et améliorez votre expérience</p> <br />
					<form class='formulaire' method='post' action='' enctype="multipart/form-data">
						
						<p> 
							<br>
							<label>Prénom : </label>
							<input class='champ' type='text' id='prenom_utilisateur'  name='prenom_utilisateur' placeholder='Prénom' maxlength='25' size='45' required />
						</p>
						<p>
							<label>Nom : </label>
							<input class='champ' type='text' id='nom_utilisateur' name='nom_utilisateur' placeholder='Nom' maxlength='25' size='45' required />
						</p>
						<p>
							<label>Sexe : </label>
							<input type="radio" id='sexe_utilisateur' name='sexe_utilisateur' value='1' id='homme' required /><label for='1'> Homme </label>
							<input type="radio" id='sexe_utilisateur' name='sexe_utilisateur' value='0' id='femme' required /><label for='0'> Femme </label>
						</p>
						<p>
							<ul style="list-style-type: none; text-align: center;">
								<li> <label style="text-align: center;">Photo de profil : </label> </li>
								<li> <input type="file" id="photo_utilisateur" name="photo_utilisateur"> </li>
							</ul>	
                		</p>
						<p>
							<label>Date de naissance : </label>
							<input class='champ' type='date' id='date_naissance_utilisateur' name='date_naissance_utilisateur' maxlength='25' size='45' required />
						</p>
						<p>
							<label>Mail : </label>
							<input class='champ' type='email' id='email_utilisateur' name='email_utilisateur' placeholder='Adresse mail' maxlength='35' size='37' required />
						</p>
						<p>
							<label>Confirmation : </label>
							<input class='champ' type='email' id='email' name='email' placeholder="Confirmation de l'adresse mail" maxlength='35' size='37' required />
						</p>
						<p>
							<label>Promotion : </label>
							<input class='champ' id='promotion_utilisateur' type='number' name='promotion_utilisateur' placeholder='Ex : 176' maxlength='25' size='45' />  *
						</p>
						<p>
							<label>Pseudo : </label>
							<input class='champ' type='text' id='pseudo_utilisateur' name='pseudo_utilisateur' placeholder='Pseudo' maxlength='25' size='45'  required />
						</p>
						<p>
							 <label>Mot de passe : </label>
							<input class='champ' type='password' id='password_utilisateur' name='password_utilisateur' placeholder='Mot de passe' minlength="6" maxlength='25' size='30' required />
						</p>
						<p>
							<label>Confirmation : </label>
							<input class='champ' type='password' id='password' name='password' placeholder='Confirmation du mot de passe' minlength='6' maxlength='25' size='30' required />
						</p>
						<p>
							<label>S'abonner à la newsletter ? </label>
							<input type="radio" id='spam_utilisateur' name='spam_utilisateur' value='1' id='oui' required /><label for='1'> Oui </label>
							<input type="radio" id='spam_utilisateur' name='spam_utilisateur' value='0' id='non' required /><label for='0'> Non </label>
							<br> 
							<span style="font-size: 1rem"> * champ facultatif</span>
						</p>

						<p>
							<input type='submit' class='btn' style="color: white;" name='forminscription' value="S'inscrire" />
							<br />
						</p>
					</form>
					<?php 
					//connexion à la BDD
					

					//Vérification des données 
					if(isset($_POST['forminscription']))
					{
						//htmlspecialchars : pour que l'utilisateur n'entre pas de la merde
						$prenom = htmlspecialchars($_POST['prenom_utilisateur']);
						$nom = htmlspecialchars($_POST['nom_utilisateur']);
						$sexe = $_POST['sexe_utilisateur'];
						$date = htmlspecialchars($_POST['date_naissance_utilisateur']);
						$mail = htmlspecialchars($_POST['email_utilisateur']);
						$mail2 = htmlspecialchars($_POST['email']);
						$pseudo = htmlspecialchars($_POST['pseudo_utilisateur']); 
						$mdp = sha1($_POST['password_utilisateur']);
						$mdp2 = sha1($_POST['password']);
						$spam = $_POST['spam_utilisateur'];
						move_uploaded_file($_FILES['photo_utilisateur']['tmp_name'],"../resources/photos/utilisateur/".$_FILES['photo_utilisateur']['name']);
						$photo=$_FILES['photo_utilisateur']['name'];
						
						if(!empty($_POST['sexe_utilisateur']) AND !empty($_POST['prenom_utilisateur']) AND !empty($_POST['nom_utilisateur']) AND !empty($_POST['date_naissance_utilisateur']) AND !empty($_POST['email_utilisateur']) AND !empty($_POST['email']) AND !empty($_POST['pseudo_utilisateur']) AND !empty($_POST['password_utilisateur']) AND !empty($_POST['password']) AND !empty($_POST['spam_utilisateur']))
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
												$req = $bdd -> prepare('INSERT INTO utilisateur(prenom_utilisateur, nom_utilisateur, sexe_utilisateur, date_naissance_utilisateur, email_utilisateur, pseudo_utilisateur, password_utilisateur, spam_utilisateur) VALUES(?,?,?,?,?,?,?,?)');
												$req->execute(array($prenom,$nom,$sexe,$date,$mail,$pseudo,$mdp,$spam));
												//On crée une variable de session 
												//$_SESSION['comptecree'] = '<p class="reussi">Votre compte a bien été créé !</p>'; 
												
												// header('Location: accueil.php');

												if (!empty($photo))
												{

													  $req=$bdd -> prepare("UPDATE utilisateur SET photo_utilisateur = ? WHERE pseudo_utilisateur = ? ");
													  $req->execute(array($photo,$pseudo));
												}
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

	<?php include ("footer.php") ?>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>