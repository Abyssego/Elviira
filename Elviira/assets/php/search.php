<?php
// Connexion à la base de données
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

// Récupération de la requête de recherche depuis l'URL
$query = "%" . $_GET['q'] . "%";

$resultat = $cnn -> prepare('SELECT * FROM produit WHERE nomProduit LIKE :produit');

$resultat->bindParam(':produit',  $query, PDO::PARAM_INT);

// Exécution de la requête
$resultat->execute();

// Récupération des résultats sous forme de tableau associatif
$results = [];
if ($result->num_rows > 0) {
    while($ligne = $resultat -> fetch()) {
        $results[] = $ligne;
    }
}

// Fermeture de la connexion à la base de données
$resultat->closeCursor();

// Retour des résultats en format JSON
echo json_encode($results);
?>
