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
	<link rel="stylesheet" href="assets/css/search.css" />
	<noscript>
		<link rel="stylesheet" href="assets/css/noscript.css" />
	</noscript>
</head>

<body class="is-preload">

	<!-- Wrapper -->
	<div id="wrapper" class="fade-in">

		<!-- Intro -->
		<div id="intro">
			<h1>Elviira</h1>
			<p>A french wear brand</p>
			<ul class="actions">
				<li><a href="#header" class="button icon solid solo fa-arrow-down scrolly">Continue</a></li>
			</ul>
		</div>

		<!-- Header -->
		<header id="header">
			<a href="index.php" class="logo">Elviira</a>
		</header>

		<!-- Nav -->
		<nav id="nav">
			<ul class="links">
				<li class="active"><a href="index.php">Boutique</a></li>
				<li><a href="Produits.php?Page=0">Produits</a></li>
				<li><a href="infoElviira.php">This is Elviira</a></li>
				<li><a href="contact.php">Contact</a></li>
				<li><a href="appli.php">Elviira mobile</a></li>

				<?php
				session_start();

				// Définir une durée de vie courte pour la session (par exemple, 30 minutes)
				$session_duration = 1800; // 30 minutes en secondes
				
				// Vérifier si la session est active
				if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $session_duration)) {
					// La session a expiré, déconnecter l'utilisateur
					session_unset();
					session_destroy();
					header("Location: connexion.php"); // Rediriger vers la page de connexion
					exit();
				}

				// Mettre à jour le temps de la dernière activité
				$_SESSION['last_activity'] = time();

				// Vérifier si l'utilisateur est connecté
				if (!isset($_SESSION['mailUser'])) {
					// L'utilisateur n'est pas connecté, afficher les boutons Connexion et Inscription
					echo '<li style="padding-left: 20%"><a href="connexion.php">Connexion</a></li>';
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

			<!-- Featured Post -->
			<article class="post featured">
				<header class="major">

				</header>
				<!-- Code du bouton de recherche -->
				<div class="container">
				    <input type="text" id="search-input" oninput="liveSearch(this.value)" placeholder="Search...">
				    <ul id="search-results"></ul>
				    <script src="script.js"></script>
				    <div class="search"></div>
				</div>

				<a href="#" class="image main"><img src="images/habits1.jpg" alt="" /></a>
				<ul class="actions special">
					<li><a href="#" class="button large">Nouveautés</a></li>
				</ul>
			</article>

			<!-- Posts -->
			<section class="posts">
				<article>
					<header>
						<span class="date">April 24, 2017</span>
						<h2><a href="Marques.php?Marque=Hermès&Page=0">Hermès<br />
							</a></h2>
					</header>
					<a href="Marques.php?Marque=Hermès&Page=0" class="image fit"><img src="images/marque/hermes.jpg" alt=""
							style="width: auto; height: 385px;" /></a>
					<ul class="actions special">
						<li><a href="Marques.php?Marque=Hermès&Page=0" class="button">Voir 🛒</a></li>
					</ul>
				</article>
				<article>
					<header>
						<span class="date">April 22, 2017</span>
						<h2><a href="Marques.php?Marque=Gucci&Page=0">Gucci<br />
							</a></h2>
					</header>
					<a href="Marques.php?Marque=Gucci&Page=0" class="image fit"><img src="images/marque/gucci.jpg" alt=""
							style="width: auto; height: 385px;" /></a>
					<ul class="actions special">
						<li><a href="Marques.php?Marque=Gucci&Page=0" class="button">Voir 🛒 </a></li>
					</ul>
				</article>
				<article>
					<header>
						<span class="date">April 18, 2017</span>
						<h2><a href="Marques.php?Marque=Gucci&Page=0">Dior<br />
							</a></h2>
					</header>
					<a href="Marques.php?Marque=Dior&Page=0" class="image fit"><img src="images/marque/dior.jpg" alt="" style="width: auto; height: 385px;"/></a>
					<p>Description produit 3</p>
					<ul class="actions special">
						<li><a href="Marques.php?Marque=Dior&Page=0" class="button">Voir 🛒</a></li>
					</ul>
				</article>
				<article>
					<header>
						<span class="date">April 14, 2017</span>
						<h2><a href="Marques.php?Marque=Louis-Viton&Page=0">Louis-Viton<br />
							</a></h2>
					</header>
					<a href="Marques.php?Marque=Louis-Viton&Page=0" class="image fit"><img src="images/marque/louis.jpg" alt="" style="width: auto; height: 385px;"/></a>
					<p>Description produit 4</p>
					<ul class="actions special">
						<li><a href="Marques.php?Marque=Louis-Viton&Page=0" class="button">Voir 🛒</a></li>
					</ul>
				</article>

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
	<script src="assets/js/search.js"></script>

</body>

</html>