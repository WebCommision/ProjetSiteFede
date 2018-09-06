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

    <?php include("./event.php"); ?>

    <div class="container bord">

        <div class="col-md-6 padding3">

            <article>

                <h5> Ajout de comite </h5>

                <div class = 'col-md-12 inscription'>
                    
                    <form class='formulaire' method='post' action='' enctype="multipart/form-data">
                        
                        <p>
                            <label>Cercle : </label>
                            <br />
                            <input  class='champ' type='text' id='nom_cercle'  name='nom_cercle' placeholder='Ex : Boraine' maxlength='25' size='45' required />
                        </p>
                        <p>
                            <label>Promotion du comité : </label>
                            <br />
                            <input class='champ' type='number' id='promotion_comite' name='promotion_comite' placeholder='Ex : 176' maxlength='5' size='45' required />
                        </p>
                        <p>
                            <label>Thème du comité : </label>
                            <br />
                            <input class='champ' type='text' id='theme_comite' name='theme_comite' placeholder='Ex : GuantanaMons' maxlength='25' size='45' /> *
                        </p>
                        <p>
                            <label>Photo de comité : </label> 
                            <input type="file" id="path_photo_comite" name="path_photo_comite">

                            <br>
                            <span> * champ facultatif </span>
                              
                        </p>

                        
                        <p>
                            <input type='submit' class='btn' style="color: white;" name='formcomite' value="Submit" />
                            <br />
                        </p>
                    </form>


                    <?php 
                    if(isset($_SESSION['id_utilisateur']))
                    {
                        //Vérification des données 
                        if(isset($_POST['formcomite']))
                        {


                            //htmlspecialchars : pour que l'utilisateur n'entre pas de la merde
                            $nom_cercle = htmlspecialchars($_POST['nom_cercle']);
                            $promotion_comite = htmlspecialchars($_POST['promotion_comite']);
                            $theme_comite = htmlspecialchars($_POST['theme_comite']);
                            move_uploaded_file($_FILES['path_photo_comite']['tmp_name'],"../resources/photos/comite/".$_FILES['path_photo_comite']['name']);
                            $path_photo_comite = $_FILES['path_photo_comite']['name'];
                     
                            
                            if(!empty($_POST['nom_cercle']) AND !empty($_POST['promotion_comite']) /*AND !empty($path_photo_comite)*/)
                            {   
                 
                                //On vérifie si le cercle existe : 
                                $reqcercle = $bdd -> prepare('SELECT * FROM cercle WHERE nom_cercle = ?');
                                $reqcercle -> execute(array($nom_cercle));
                                //On compte le nombre de colonnes contenant le même mail :
                                $cercleExist = $reqcercle->rowCount();

                                if($cercleExist == 1)
                                {

                                    //On vérifie que le comite de ce cercle de cette promo n existe pas deja
                                    $reqPromo = $bdd -> prepare('SELECT * FROM comite WHERE nom_cercle=? AND promotion_comite=?');
                                    $reqPromo -> execute(array($nom_cercle,$promotion_comite));
                                    $comiteExist = $reqPromo -> rowCount();
                                    if($comiteExist == 0)
                                    {
                                        
                                        //Pour rentrer les données dans la BDD et les afficher
                                        $req = $bdd -> prepare('INSERT INTO comite(nom_cercle, promotion_comite, theme_comite) VALUES(?,?,?)');
                                    $req->execute(array($nom_cercle,$promotion_comite,$theme_comite));

                                        echo "Comite créé avec succès";
                                        
                                    }

                                    else
                                    {
                                        echo '<p class="erreur"> Ce comite existe deja! !</p>';
                                    }
                                }

                                else
                                {
                                    echo '<p class="erreur"> Ce cercle n existe pas! Attention à l\'orthographe !</p>';
                                }
                            }
                        }
                    }?>


                </div>

            </article>

        </div>

      

        <div class="col-md-6 padding3">

            <article>

                <h5> Election </h5>

                <div class = 'col-md-12 inscription'>
                    
                    <form class='formulaire' method='post' action='' >
                        
                        <p>
                            <label>Cercle : </label>
                            <br />
                            <input  class='champ' type='text' id='nom_cercle'  name='nom_cercle' placeholder='Ex : Boraine' maxlength='25' size='45' required />
                        </p>
                        <p>
                            <label>Promotion du comité : </label>
                            <br />
                            <input class='champ' type='number' id='promotion_comite' name='promotion_comite' placeholder='Ex : 176' maxlength='5' size='45' required /> 
                        </p>

                        <div>
                            <h4><br>1ere personne</h4>
                            <p>
                                <label>pseudo : </label>
                                <br />
                                <input class='champ' type='text' id='pseudo_utilisateur' name='pseudo_utilisateur' placeholder='Ex : JeanMichel Crapaud' maxlength='25' size='45' /> *
                            </p>
                            <p>
                                <label>poste : </label>
                                <br />
                                <input class='champ' type='text' id='poste' name='poste' placeholder='Ex : président' maxlength='35' size='45' required />
                              
                            </p>
                            <p>
                            <label>Responsabilite: de 1 à 8, 1 étant le président </label>
                            <br />
                            <input class='champ' type='number' id='responsabilite' name='responsabilite' placeholder='Ex : 1' maxlength='5' size='45' required /> 
                        </p>

                        </div>

                        <p>
                            <input type='submit' class='btn' style="color: white;" name='formelection' value="Submit" />
                            <br />
                        </p>
                    </form>


                    <?php 
                    if(isset($_SESSION['id_utilisateur']))
                    {
                        //Vérification des données 
                        if(isset($_POST['formelection']))
                        {
                            //htmlspecialchars : pour que l'utilisateur n'entre pas de la merde
                            $nom_cercle = htmlspecialchars($_POST['nom_cercle']);
                            $promotion_comite = htmlspecialchars($_POST['promotion_comite']);
                            $pseudo_utilisateur = htmlspecialchars($_POST['pseudo_utilisateur']);
                            $nom_poste= htmlspecialchars($_POST['poste']);
                            $responsabilite = htmlspecialchars($_POST['responsabilite']);
                     
                            
                            if(!empty($_POST['nom_cercle']) AND !empty($_POST['promotion_comite']) AND !empty($_POST['pseudo_utilisateur']) AND !empty($_POST['poste']) AND !empty($_POST['responsabilite']))
                            {   
                 
                                //On vérifie si le cercle existe : 
                                $reqcercle = $bdd -> prepare('SELECT * FROM cercle WHERE nom_cercle = ?');
                                $reqcercle -> execute(array($nom_cercle));
                                //On compte le nombre de colonnes contenant le même mail :
                                $cercleExist = $reqcercle->rowCount();

                                if($cercleExist == 1)
                                {
                                    //On vérifie que le comite de ce cercle de cette promo existe
                                    $reqComite = $bdd -> prepare('SELECT * FROM comite WHERE nom_cercle=? AND promotion_comite=?');
                                    $reqComite -> execute(array($nom_cercle,$promotion_comite));
                                    $comiteExist = $reqComite -> rowCount();

                                    $comite=$reqComite->fetch();

                                    if($comiteExist == 1)
                                    {

                                             //On vérifie que l utilisateur existe
                                        $reqPseudo = $bdd -> prepare('SELECT * FROM utilisateur WHERE pseudo_utilisateur=?');
                                        $reqPseudo -> execute(array($pseudo_utilisateur));
                                        $userExist = $reqPseudo -> rowCount();

                                        $user=$reqPseudo->fetch();

                                        if($userExist == 1)
                                        {

                                            $reqPoste = $bdd -> prepare('SELECT * FROM election WHERE nom_cercle=? AND promotion_comite=? AND nom_poste=?');
                                            $reqPoste -> execute(array($nom_cercle,$promotion_comite,$nom_poste));
                                            $PosteExist = $reqPoste -> rowCount();

                                            // on verifie que le poste n est pas deja attribue
                                            if($PosteExist == 0)
                                            {
                                                $id_comite=$comite['id_comite'];
                                                $id_utilisateur=$user['id_utilisateur'];
                                                //Pour rentrer les données dans la BDD et les afficher
                                                $req = $bdd -> prepare('INSERT INTO election(nom_poste, responsabilite_election, id_comite, id_utilisateur) VALUES(?,?,?,?)');
                                                $req->execute(array($nom_poste,$responsabilite,$id_comite,$id_utilisateur));

                                                echo "Election créée avec succès";
                                            } 

                                            else
                                            {
                                                 echo "ce poste est deja occupé";
                                            }

                                        }

                                        else
                                        {
                                            echo "cet utiliateur n existe pas";
                                        }

                                    }

                                    else
                                    {
                                        echo '<p class="erreur"> Ce comite n existe pas, verifiez la promo ou creez le.</p>';
                                    }

                                }

                                else
                                {
                                    echo '<p class="erreur"> Ce cercle n existe pas! Attention à l\'orthographe !</p>';
                                }
                            }
                        }
                    }?>


                </div>

            </article>

        </div> 

    </div>

 	<?php include("./footer.php"); ?>

    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
