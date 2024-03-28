function liveSearch(query) {
    // Utilisation de la bibliothèque Fetch pour effectuer une requête AJAX
    fetch('../php/search.php?q=' + query)
        .then(response => response.json())
        .then(data => displayResults(data))
        .catch(error => console.error('Erreur lors de la recherche:', error));
}

function displayResults(results) {
    var resultsList = document.getElementById("search-results");
    resultsList.innerHTML = ""; // Effacer les résultats précédents

    // Afficher les nouveaux résultats
    results.forEach(function(result) {
        var li = document.createElement("li");
        li.textContent = result.nomProduit; // Modifier selon les colonnes de votre table
        resultsList.appendChild(li);
    });
}
