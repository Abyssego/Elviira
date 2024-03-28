<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>


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
					<h1>Connexion</h1>
				</header>
				<form method="post" style="padding-left: 340px"
					action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
					<div class="row gtr-uniform">
						<div class="col-6 col-12-xsmall">
							<label for="nomUser">e-mail:</label>
							<input type="text" name="mailUser" id="mailUser" required />

							<label for="prenomUser">Mot de passe:</label>
							<input type="password" name="passWd" id="passWd" required />
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

							if ($_SERVER["REQUEST_METHOD"] == "POST") {
								$mailUser = $_POST['mailUser'];
								$password = $_POST['passWd'];

								// Select user data from the database based on the provided email
								$sql = "SELECT * FROM user WHERE mailUser = ?";
								$selectStatement = $mysqli->prepare($sql);
								$selectStatement->bind_param("s", $mailUser);
								$selectStatement->execute();

								$result = $selectStatement->get_result();

								if ($result->num_rows > 0) {
									// User with the provided email exists, verify the password
									$row = $result->fetch_assoc();
									$hashedPassword = $row['passWd'];

									if (password_verify($password, $hashedPassword)) {
										session_start();
										$_SESSION['mailUser'] = $mailUser;
										header("Location: index.php");
										exit();
									} else {
										// Password is incorrect
										echo "Mot de passe incorrect.";
									}
								} else {
									// User with the provided email does not exist
									echo "Utilisateur non trouvé.";
								}

								$selectStatement->close();
							}




							$mysqli->close();
							?>

							<ul class="actions">
								<li><input type="submit" value="Se connecter" class="primary" /></li>
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