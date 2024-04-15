<?php
include '/xampp/htdocs/libreria/connessione_db.php'; // Includi il file di connessione al database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $titolo = $_POST['titolo'];
    $autore = $_POST['autore'];
    $anno = $_POST['anno'];
    $genere = $_POST['genere'];

    // Query per aggiornare un libro esistente
    $sql = "UPDATE libri 
            SET titolo='$titolo', autore='$autore', anno='$anno', genere='$genere'
            WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Dati del libro aggiornati con successo.";
    } else {
        echo "Errore durante l'aggiornamento del libro: " . $conn->error;
    }
}

// Query per selezionare tutti i libri
$sql_select = "SELECT * FROM libri";
$result_select = $conn->query($sql_select);


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
    <h1 class="text-center mt-5">MODIFICA LIBRO</h1>
    <div class="container d-flex align-items-center justify-content-center mt-5">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="d-flex mb-4">
                <h2 style="padding-right: 1rem;">Seleziona il libro da modificare</h2>
                <select name="id" class="bg-primary text-white zoom3 px-5 fs-3">
                    <?php
                    while ($row_select = $result_select->fetch_assoc()) {
                        echo "<option value='{$row_select['id']}'>{$row_select['titolo']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="text-center border border-primary p-3 mb-4 zoom">
                <h3 class="mb-3">NUOVO TITOLO</h3>
                <input type="text" name="titolo" class="zoom2 fs-5">
            </div>

            <div class="text-center border border-primary p-3 mb-4 zoom">
                <h3 class="mb-3">NUOVO AUTORE</h3>
                <input type="text" name="autore" class="zoom2 fs-5">
            </div>

            <div class="text-center border border-primary p-3 mb-4 zoom">
                <h3 class="mb-3">NUOVO ANNO</h3>
                <input type="number" name="anno" class="zoom2 fs-5">
            </div>

            <div class="text-center border border-primary p-3 mb-4 zoom">
                <h3 class="mb-3">NUOVO GENERE</h3>
                <input type="text" name="genere" class="zoom2 fs-5"><br>
            </div>

            <div class="text-center">
                <button class="mt-5 px-5 fs-3 py-2 zoom3 btn btn-primary" type="submit" name="submit">MODIFICA LIBRO</button>
            </div>
        </form>

    </div>
    </div>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>