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

    <div class="container bord padding3">

            <article>
                
                <div class="containerArticle">
                    <div class="mauto">
                        <div class="center ">
                            <h1>Bleusaille</h1>
                        </div>
                        <p> 
                            La Bleusaille, ce n'est pas que l'intégration, elle te permettra de développer une personnalité forte et épanouie nécessaire durant
                            les études difficiles que tu as choisi d'entreprendre et à l'ingénieur que tu deviendras. Le côté relationnel, qui est tout aussi
                            important pour un ingénieur, n'apparaît dans aucun programme de cours, mais a une grande place dans la Bleusaille.
                        </p>
                        <p>
                            On ne peut pas faire n'importe quoi n'importe comment, toutes les activités 
                            sont organisées avec le plus grand sérieux. Pendant les deux semaines et 
                            demie de Bleusaille, les cours, où ta présence est obligatoire, sont allégés.
                             Tu ne dois donc pas craindre d'être largué dès les premières semaines. 
                        </p>
                        <div class=" divImg mauto floatedRight ">
                            <img class="imgArticle1" src="../resources/img/bleusaille1.jpg" alt="photo bleusaille 179" />
                        </div>
                        <p>
                            Tu as certainement déjà entendu parler de la Bleusaille via un copain qui a fait son baptême ou via les médias. Et bien, tout ce que tu as entendu
                            à propos du baptême à Bruxelles, Liège, Louvain-la-Neuve... tu peux l'oublier. Chez nous, à la Faculté Polytechnique de Mons, nous avons 
                            une Bleusaille qui ne se trouve nulle part ailleurs.</p>
                            <p> La Bleusaille est un excellent moyen d'intégration. Cette année sera la 180ème où celle-ci a lieu, c'est dire si elle a fait 
                            ses preuves. Elle te permettra de tisser très rapidement des liens avec tous ceux qui, comme toi, sont nouveaux, mais aussi avec tous
                            les étudiants baptisés et même avec ceux qui ne sont plus étudiants.
                        </p>
                        <p>
                            La Bleusaille, c'est pour tout le monde. Si tu as des problèmes de santé,
                            rien ne t'empêche de la faire. Il te suffit de nous le signaler et toutes 
                            les dispositions nécessaires seront prises pour que tu puisses, au même
                            titre que les autres, participer dans les meilleures conditions à l'accueil
                            qui est organisé. La consommation de bière n'est pas une condition sine qua 
                            non pour effectuer sa Bleusaille. A aucune activité tu ne seras amené à boire 
                            de l’alcool. Si tu ne veux ou ne peux pas en boire et ce, quelle qu'en soit 
                            la raison, personne ne t'obligera à le faire. Aucune atteinte à l'intégrité 
                            humaine de la part de quiconque n'est admise, les Togés et autres responsables 
                            ainsi que la police estudiantine (dont le rôle est défini plus loin) sont là 
                            pour y veiller. Sache aussi que chaque étudiant baptisé est tenu de respecter 
                            un "code de bon comportement" qui lui est remis et qu’aucun jeu à connotation 
                            sexuelle n’est permis.
                        </p>
                        <p>
                            Dès le début de Bleusaille, un parrain te prendra en charge et te guidera tout 
                            au long de celle-ci.
                        </p>
                        <div class=" divImg  floatedLeft ">
                            <img class="imgArticle2" src="../resources/img/bleusaille2.jpg" alt="photo bleusaille 179" />
                        </div>
                        <p>
                            La Bleusaille ne dure que deux semaines et demie (elle ne s'étend pas sur plusieurs
                             mois comme dans d'autres universités), ce qui ne représente pas grand chose par rapport
                              aux cinq années fantastiques qu'elle t'offre par la suite. La Bleusaille est donc un court 
                              passage obligatoire pour pouvoir participer ou, plus tard, pour organiser la plupart
                               des activités au sein de la Faculté.
                        </p>
                        <p>
                            Même si tu n'es pas convaincu de faire ta Bleusaille, nous t'invitons à essayer quand même 
                            et si elle ne te convient toujours pas, tu pourras arrêter quand tu veux.
                        </p>
                    </div>
                    <div class="mauto">
                        <div class="center">
                            <h1>La Police Estudiantine</h1>
                        </div>
                        <p>
                            La Police estudiantine est une originalité de notre accueil, ainsi qu'une garantie supplémentaire 
                            du bon fonctionnement de celui-ci et d'un bon encadrement des bleus. Elle est constituée d'étudiant(e)s 
                            volontaires que nous appelons 'flics'. Ils se distinguent des autres par le port d’un t-shirt de 
                            couleur vive, et sont présents à toutes les activités de l'accueil.
                        </p>
                        <p>
                            Ces étudiants et étudiantes veillent à ce qu'il n'y ait aucun excès durant l'accueil. Ils escortent 
                            les bleus jusqu'à la gare ou jusqu'à leur kot en ville à la fin de la journée, ils veillent sur tes 
                            affaires lors des activités (lunettes, portefeuille...) et se chargent de te prévenir des différentes 
                            choses dont tu aurais besoin pour celles-ci (maillot...). La police estudiantine se charge également de
                             récolter les certificats médicaux des personnes ayant des problèmes de santé (asthme, allergies...).
                        </p>
                    </div>
                    <div class="mauto"> 
                        <div class="center">
                            <h1>Un bref aperçu des activités</h1>
                        </div>
                        <ul>
                            <li> <p>Le premier jour sera organisé une petite visite de Mons ainsi qu’une soirée présentant les différents cercles de notre Faculté.</p></li>
                            <li> <p>Le deuxième jour aura lieu le Parrainage où tu pourras acquérir des parrains qui t’aideront tout au long de ces 2 semaines. </p></li>
                            <li> <p>Tu auras l'occasion d'assister à de mémorables journées sportives.</p></li>
                            <li> <p>Tu pourras exprimer toute ta verve et ton humour lors de la soirée des bleus devant bon 
                                nombre d'étudiants, d'anciens et de professeurs de la Faculté.</p></li>
                            <li><p> Le mercredi de la première semaine d'octobre, ta vie aura changé puisque tu seras baptisé, tu seras un Polytech à part entière,
                                c'est en tout cas ce que nous espérons de tout cœur et nous fêterons ça tous ensemble, bonheur garanti !</p></li>
                        </ul>
                        <p>
                            Cette année, la bleusaille commencera le mardi 18 septembre et prendra fin le mercredi 3 octobre 2018.
                        </p>
                        <p>
                        Nous t'invitons cordialement à venir prendre un verre et discuter avec les étudiants le dimanche 16 à partir 
                        de 20h00 dans la salle à droite du bar de la Cité Houzeau (69 Bd Dolez). 
                        </p>
                        <p>
                            Des informations complémentaires te seront communiquées à la rentrée. Alors maintenant, à toi de jouer... 
                            Intègre-toi au mieux dans notre communauté, c'est là notre vœu le plus cher, afin d'assurer très bientôt 
                            la relève et de faire de tes études une extraordinaire occasion de rencontres.
                        </p>
                    </div>
                </div>
                

                

            </article>

    </div>

 	<?php include("./footer.php"); ?>

    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
