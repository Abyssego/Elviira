<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>Elviira.fr</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/form.css" />
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css" />
    </noscript>
</head>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper" class="fade-in">

        <!-- Header -->
        <header id="header">
            <a href="index.html" class="logo">Elviira</a>
        </header>

        <!-- Nav -->
        <nav id="nav">
            <ul class="links">
                <li><a href="index.php">Boutique</a></li>
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

            <!-- Post -->
            <section class="post">
                <header class="major">
                    <h1>Inscription</h1>
                </header>
                <form method="post" style="padding-left: 340px" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="row gtr-uniform">
                        <div class="col-6 col-12-xsmall">
                            <label for="nomUser">Nom:</label>
                            <input type="text" name="nomUser" id="nomUser" required />

                            <label for="prenomUser">Prenom:</label>
                            <input type="text" name="prenomUser" id="prenomUser" required />

                            <label for="adresseUser">Adresse:</label>
                            <input type="text" name="adresseUser" id="adresseUser" required />

                            <label for="villeUser">Ville:</label>
                            <input type="text" name="villeUser" id="villeUser" required />

                            <label for="cpUser">Code postal:</label>
                            <input type="text" name="cpUser" id="cpUser" required />

                            <label for="mailUser">E-mail :</label>
                            <input type="text" name="mailUser" id="mailUser" required />

                            <label for="telUser">Téléphone :</label>
                            <input type="text" name="telUser" id="telUser" required />

                            <label for="password">Mot de passe :</label>
                            <input type="password" name="password" id="password" required />

                            <label for="confirmPassword">Confirmer le mot de passe :</label>
                            <input type="password" name="confirmPassword" id="confirmPassword" required />
                        </div>

                        <div class="col-12">
                            <!-- PHP validation logic goes here -->
                            <?php
                            error_reporting(E_ALL);
                            ini_set('display_errors', 1);

                            $host = "localhost";
                            $username = "root";
                            $password = "root";
                            $database = "elviira";

                            $mysqli = new mysqli($host, $username, $password, $database);

                            if ($mysqli->connect_error) {
                                die("Connection failed: " . $mysqli->connect_error);
                            }

                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                // Retrieve and sanitize form data
                                $nomUser = $_POST['nomUser'];
                                $prenomUser = $_POST['prenomUser'];
                                $adresseUser = $_POST['adresseUser'];
                                $villeUser = $_POST['villeUser'];
                                $cpUser = $_POST['cpUser'];
                                $mailUser = $_POST['mailUser'];
                                $telUser = $_POST['telUser'];
                                $numPerm = 0;
                                $password = $_POST['password'];
                                $confirmPassword = $_POST['confirmPassword'];

                                // Check if the passwords match
                                if (!hash_equals($password, $confirmPassword)) {
                                    echo "Les mots de passe ne correspondent pas.";
                                } elseif (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{10,}$/", $password)) {
                                    echo "Le mot de passe doit contenir 10 caractères, 1 chiffre, une majuscule et un symbol.";
                                } else {
                                    // Check for existing user with the same email using prepared statement
                                    $existingUserQuery = "SELECT * FROM user WHERE mailUser = ?";
                                    $existingUserResult = $mysqli->prepare($existingUserQuery);
                                    $existingUserResult->bind_param("s", $mailUser);
                                    $existingUserResult->execute();
                                    $existingUserResult->store_result();

                                    if ($existingUserResult->num_rows > 0) {
                                        echo "Un utilisateur avec cet e-mail existe déjà.";
                                    } else {
                                        // Hash the password
                                        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                                        // Insert data into the user table using prepared statement
                                        $sql = "INSERT INTO user (nomUser, prenomUser, adresseUser, villeUser, cpUser, mailUser, telUser, numPerm, passWd) 
                                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                                        $insertStatement = $mysqli->prepare($sql);
                                        $insertStatement->bind_param("sssssssss", $nomUser, $prenomUser, $adresseUser, $villeUser, $cpUser, $mailUser, $telUser, $numPerm, $hashedPassword);

                                        if ($insertStatement->execute()) {
                                            header("Location: index.php");
                                        } else {
                                            echo "Erreur lors de l'inscription : " . $mysqli->error;
                                        }
                                    }

                                    $existingUserResult->close();
                                }
                            }

                            $mysqli->close();
                            ?>

                            <ul class="actions">
                                <li><input type="submit" value="S'inscrire" class="primary" /></li>
                                <li><input type="reset" value="Réinitialiser" /></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </section>
        </div>
        <!-- Copyright -->
        <div id="copyright">
            <ul>
                <li>
                    <pre>16 place Carnot,Lyon2 +33685109740 contact@elviira.fr</pre>
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