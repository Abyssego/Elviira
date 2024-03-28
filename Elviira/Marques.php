<!DOCTYPE HTML>
<!--
    Massively by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<?php
$host = "localhost";
$user = "root";
$password = "root";
$bdd = "elviira";


//On essaie de se connecter
try {    //Connexion à la base et au serveur
    $cnn = new PDO("mysql:host=$host;dbname=$bdd;charset=utf8",$user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
// En cas d'erreur, on affiche un message et arrete tout
catch(PDOExeption $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
<head>
    <title>Elviira.fr</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css" />
    </noscript>
</head>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
        <header id="header">
            <a href="index.php" class="logo">Elviira</a>
        </header>

        <!-- Nav -->
        <nav id="nav">
            <ul class="links">
                <li class="active"><a href="index.php">Boutique</a></li>
                <li><a href="infoElviira.php">This is Elviira</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="appli.php">Elviira mobile</a></li>
                <?php
                session_start();
                // Vérifier si l'utilisateur est connecté
                if (!isset($_SESSION['mailUser'])) {
                    // L'utilisateur n'est pas connecté, afficher les boutons Connexion et Inscription
                    echo '<li style="padding-left: 265px"><a href="connexion.php">Se Connecter</a></li>';
                    echo '<li style="padding-left: 0px"><a href="inscription.php">Inscription</a></li>';

                } else {
                    // L'utilisateur est connecté, afficher le bouton Mon Compte
                    echo '<li style="padding-left: 405px"><a href="monCompte.php">Mon Compte</a></li>';
                }
                ?>
            </ul>

        </nav>

        <!-- Main -->
        <div id="main">


            <!-- Posts -->
            <section class="posts">

                <?php
                if(isset($_GET['Marque']))
                {

                    $aPartirDe = $_GET['Page'] * 4;


                    $resultat = $cnn -> prepare('SELECT produit.numProduit, nomProduit, nomTypeProduit, couleurProduit, descriptionProduit, nomMarque
                                                FROM produit
                                                WHERE nomMarque = :nomMarque
                                                LIMIT 4 OFFSET :indexProduit');

                    $resultat->bindParam(':nomMarque', $_GET['Marque'], PDO::PARAM_STR);
                    $resultat->bindParam(':indexProduit', $aPartirDe, PDO::PARAM_INT);
                    $resultat->execute();
                    
                    while ($ligne = $resultat -> fetch())
                    { ?>    
                        <article>
                            <header>
                                <span class="date"><?php echo $ligne['nomTypeProduit']; ?></span>
                                <h2><a href="produit.php?idProduit=<?php echo $ligne['numProduit']; ?>"><?php echo $ligne['nomMarque']; ?><br />
                                    </a></h2>
                            </header>
                            <a href="produit.php?idProduit=<?php echo $ligne['numProduit']; ?>" class="image fit"><img src="images/produit/<?php echo $ligne['nomProduit']; ?>.jpg" alt=""
                                    style="width: auto; height: 385px;" /></a>
                            <ul class="actions special">
                                <li><a href="produit.php?idProduit=<?php echo $ligne['numProduit']; ?>" class="button">Voir 🛒</a></li>
                            </ul>
                        </article>
                    <?php 
                    }
                }
                $resultat->closeCursor();
                ?>
 

            </section>



            <!-- Footer -->
            <footer>
                <div class="pagination">
                    <?php
                    $resultat = $cnn -> prepare('SELECT COUNT(numProduit)
                             FROM produit
                             WHERE nomMarque = :nomMarque');

                    $resultat->bindParam(':nomMarque', $_GET['Marque'], PDO::PARAM_STR);
                    $resultat->execute();
                    
                    if ($ligne = $resultat -> fetch())
                    {
                        $numTotalProduit = $ligne['COUNT(numProduit)'];
                    }


                    for($i = 0; $i<$numTotalProduit/4; $i++)
                    { 
                        //If pour que la page où l'on est actuellement soit désigner en page active et donc que le bouton soit en gris pour se différencier des autres en blanc
                        if($i == $_GET['Page'])
                        {  //Mettre un +1 dans le deuxième echo car sinon, cela commence de 0 et c'est pas joli joli
                            ?>
                            <a href="Marques.php?Marque=<?php echo $_GET['Marque']; ?>&Page=<?php echo $i; ?>" class="page active"><?php echo $i+1; ?></a>
                            <?php
                        }
                        else
                        {
                            ?>
                            <a href="Marques.php?Marque=<?php echo $_GET['Marque']; ?>&Page=<?php echo $i; ?>" class="page"><?php echo $i+1; ?></a>
                            <?php
                        }

                    }
                    $resultat->closeCursor();
                    ?>

                </div>
            </footer>

        </div>

    </div>




    <!-- Copyright -->
    <div id="copyright">
        <ul>
            <li>
                <pre>16 place Carnot, Lyon2 +33685109740 contact@elviira.fr</pre>
            </li>
            <ul class="icons alt">
                <li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a>
                </li>
                <li><a href="https://www.instagram.com/elviira.fr/" class="icon brands alt fa-instagram"><span
                            class="label">Instagram</span></a></li>
                <li><a href="#" class="icon brands alt fa-tiktok"><span class="label">Tiktok</span></a></li>
            </ul>
            <li>&copy; Elviira.fr</li>
        </ul>
    </div>

    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>