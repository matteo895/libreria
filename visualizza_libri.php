<?php
// includi il file di connessione al database
include "/xampp/htdocs/libreria/connessione_db.php";

// Query per selezionare tutti i libri
$query_libri = "SELECT id, titolo, autore, anno, genere FROM libri";
$result = $conn->query($query_libri);

// Verifica se ci sono risultati
if ($result->num_rows > 0) {
    echo "<h1>Elenco dei libri disponibili</h1>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>{$row['id']} - {$row['titolo']} - {$row['autore']} - {$row['anno']} - {$row['genere']} ";
        echo "<a href='modifica_libro.php?id={$row['id']}'>Modifica</a> - ";
        echo "<a href='rimuovi_libro.php?id={$row['id']}'>Rimuovi</a> - ";
        echo "<a href='aggiungi_libro.php?id={$row['id']}'>Aggiungi</a></li>";
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

<body>
    <div class="container">
        <button class=" mt-5 px-5 fs-5 py-2 zoom3 btn btn-primary" type="submit" name="submit">
            <a href="./aggiungi_libro.php" class="nav-link">TORNA ALL'AGGIUNTA LIBRI</a>
        </button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>