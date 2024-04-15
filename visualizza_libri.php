<?php
// includi il file di connessione al database
include "/xampp/htdocs/libreria/connessione_db.php";

// Query per selezionare tutti i libri
$query_libri = "SELECT id, titolo, autore, anno, genere FROM libri";
$result = $conn->query($query_libri);

// Verifica se ci sono risultati
if ($result->num_rows > 0) {
    echo "<h1 class = 'text-center mt-5 mb-5 fs-1'>ELENCO DEI LIBRI DISPONIBILI</h1>";
    echo "<ul class= 'nav-link'>";
    while ($row = $result->fetch_assoc()) {
        echo "<li class = 'text-center'>
        <div class = 'container'>
        <h2 class = 'fs-1 mb-4 py-3 border border-primary' >N LIBRO : {$row['id']} </h2>
        <h2 class = 'fs-1 mb-4 mt-3 py-3 border border-primary'>TITOLO : {$row['titolo']}</h2>
        <h2 class = 'fs-1 mb-4 py-3 border border-primary'>AUTORE : {$row['autore']} </h2> 
        <h2 class= 'fs-1 mb-4 py-3 border border-primary'>ANNO :  {$row['anno']} </h2>
        <h2 class = 'fs-1 mb-4 py-3 border border-primary'> GENERE : {$row['genere']} </h2>";
        echo "<div class ='d-flex justify-content-center mt-5'>
        <button class=' mt-5 mx-5 px-4 fs-5 py-2 zoom3 btn btn-primary' type='submit' name='submit'>
          <a href='modifica_libro.php?id={$row['id']}' class='nav-link  fs-4'>MODIFICA</a> 
        </button>";
        echo
        "<button class=' mt-5 mx-5 px-4 fs-5 py-2 zoom3 btn btn-primary' type='submit' name='submit'>
          <a href='rimuovi_libro.php?id={$row['id']}'  class='nav-link  fs-4'>RIMUOVI</a> 
        </button>";
        echo
        "<button class=' mt-5 mx-5 px-4 fs-5 py-2 zoom3 btn btn-primary ' type='submit' name='submit'>
        <a href='aggiungi_libro.php?id={$row['id']}'  class='nav-link fs-4'>AGGIUNGI</a>
        </button>
        </div></li></div>";
    }
    echo "</ul>";
} else {
    echo "Nessun libro disponibile.";
}

// Chiudi la connessione al database
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elenco Libri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-dark text-white">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>