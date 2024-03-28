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
            <section class="post">

            <?php
            //Affichage du produit selon le produit qui a  été séléctionné
            if (isset($_GET['idProduit'])) {

                $resultat = $cnn -> prepare('SELECT produit.numProduit, nomProduit, nomTypeProduit, couleurProduit, descriptionProduit
                                             FROM produit
                                             WHERE produit.numProduit = :numProduit');
                $resultat->bindParam(':numProduit', $_GET['idProduit'], PDO::PARAM_INT);
                $resultat->execute();
                
                while ($ligne = $resultat -> fetch())
                { ?>    
                <header class="major">
                    <span class="date"><?php echo $ligne['nomTypeProduit']; ?></span>
                    <h1><?php echo $ligne['nomProduit']; ?></h1>
                    <p>Elviira</p>
                </header>
                <div class="image main" style="display: flex; align-items: center;">
                    <img src="images/produit/<?php echo $ligne['nomProduit']; ?>.jpg" alt="" style="width: auto; height: 650px" />
                    <div style="margin-left: 20px;">
                        <!-- Affichage des informations des produits-->
                        <p>Description :<?php echo $ligne['descriptionProduit']; ?></p>
                        <p>Couleur : <?php echo $ligne['couleurProduit']; ?></p>

                        <!-- Affichage dans une liste déroulante des tailles -->
                        <label for="taille">Taille :</label>
                        <?php

                        if (isset($_GET['idProduit'])) {

                            $lesTailles = $cnn -> prepare('SELECT nomTaille
                                                            FROM tailleproduit
                                                            WHERE numProduit = :numProduit');
                            $lesTailles->bindParam(':numProduit', $_GET['idProduit'], PDO::PARAM_INT);
                            $lesTailles->execute();
                            
                            ?>
                            <select name="tailleProduit" id="taille">
                                <option value="">--Choisissez votre taille--</option>
                            <?php
                            while ($taille = $lesTailles -> fetch())
                            { ?>    
                                <option value="<?php echo $taille['nomTaille']; ?>"><?php echo $taille['nomTaille']; ?></option>
                            <?php
                            }
                            $lesTailles->closeCursor();
                        }
                            ?>
                        
                            </select>
                    </div>
                </div>

                <?php
                }
                $resultat->closeCursor();
            }
            ?>

            </section>

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