	<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<?php
$host = "localhost";
$username = "root";
$password = "root";
$database = "elviira";

// Create a connection to the database
$mysqli = new mysqli($host, $username, $password, $database);

// Check the connection
if ($mysqli->connect_error) {
	die("Connection failed: " . $mysqli->connect_error);
}
$mysqli->close();
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
			<a href="index.html" class="logo">Elviira</a>
		</header>

		<!-- Nav -->
		<nav id="nav">
			<ul class="links">
				<li><a href="index.php">Boutique</a></li>
				<li class="active"><a href="infoElviira.php">This is Elviira</a></li>
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
					<span class="date">Septemnre 04, 2023</span>
					<h1>This is a<br />
						Elviira</h1>
					<p>A french wear brand</p>
				</header>
				<div class="image main"><img src="images/habits1.jpg" alt="" /></div>
				<p>Elviira est une marque francaise originaire de lyon, co-fondée par Yanis Hamidou et Mathéo Guéry en
					septembre 2023. </p>
				</br>
				<p>Nos valeurs sont :<br>La satisfaction client - Mettre en avant notre service client réactif et
					personnalisé pour répondre à vos besoins et à vos préocupations, afin de créer une relation
					durable</br></p>
				<p>Suivre le tendances - Nous nous engageons à rester à la pointe de la mode en proposant des articles
					qui suivent les dernières tendances, pour que vous n'ayez jamais à attendre des nouveautés</br></p>
				<p>Fiabilité et rapidité - Nous nous assurons personnellement que chacun d'entre vous receviez vos
					commandes rapidement et en parfait état, dans le but d'établir une relation de confiance avec vous.
					</br></p>
				<p>Selection exclusive - Chez Elviira, nous proposont une séléction soigneusement choisie de vêtements
					haut de gamme provenant de marques renomées, afin de vous offrir une expérience shopping unique.</p>


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