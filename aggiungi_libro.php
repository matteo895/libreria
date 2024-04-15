<?php
include '/xampp/htdocs/libreria/connessione_db.php'; // Includi il file di connessione al database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titolo = $_POST['titolo'];
    $autore = $_POST['autore'];
    $anno = $_POST['anno'];
    $genere = $_POST['genere'];

    // Query per inserire un nuovo libro
    $sql = "INSERT INTO libri (titolo, autore, anno, genere) 
            VALUES ('$titolo', '$autore', '$anno', '$genere')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuovo libro aggiunto con successo.";
    } else {
        echo "Errore durante l'aggiunta del libro: " . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-dark text-white">
    <h1 class="mt-5 mb-3 text-center" style="font-size: 5rem;">Aggiungi un nuovo libro</h1>
    <div class="container d-flex align-items-center justify-content-center">
        <div class="text-center mt-5">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                <div class="zoom text-center border border-primary p-3 mb-4">
                    <h2 class="mb-3">TITOLO</h2>
                    <input class="mt-3 zoom5" type="text" name="titolo" required>
                </div>

                <div class="zoom text-center border border-primary p-3 mb-4">
                    <h2 class="mt-3">AUTORE</h2>
                    <input class="mt-3 zoom5" type="text" name="autore" required>
                </div>

                <div class="zoom text-center border border-primary p-3 mb-4 px-5 ">
                    <h2 class="mt-3">ANNO DI PUBBLICAZIONE</h2>
                    <input class="mt-3 zoom5" type="number" name="anno">
                </div>

                <div class="zoom text-center border border-primary p-3 mb-4">
                    <h2 class="mt-3">GENERE</h2>
                    <input class="mt-3 zoom5" type="text" name="genere" class="mb-5">
                </div>

                <div>
                    <button class="mt-3 px-5 fs-5 py-2 zoom3 btn btn-primary" type="submit" name="submit">AGGIUNGI LIBRO</button>
                </div>
            </form>
            <div class=" mt-4">
                <button class="mt-3 px-5 fs-5 py-2 zoom3 btn btn-primary" type="submit" name="submit">
                    <a href="./visualizza_libri.php" class="nav-link">Mostra Libri Aggiunti</a>
                </button>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>