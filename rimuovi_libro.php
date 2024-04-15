<?php
include '/xampp/htdocs/libreria/connessione_db.php'; // Includi il file di connessione al database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Query per rimuovere un libro
    $sql = "DELETE FROM libri WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Libro rimosso con successo.";
    } else {
        echo "Errore durante la rimozione del libro: " . $conn->error;
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
    <h1 class="text-center mt-5 mb-5 " style="font-size: 6rem;">Rimuovi libro</h1>
    <div class="container d-flex flex-column align-items-center justify-content-center mt-5">
        <div class="text-center border border-primary p-3 zoom4 ">
            <form class="py-5 px-5" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <h2 class="mb-5" style="font-size: 3rem ;"> Seleziona il libro da rimuovere</h2>
                <div class="text-center fs-1">
                    <select name="id" class="zoom3 bg-primary text-white text-center px-5 fs-1">
                        <?php
                        while ($row_select = $result_select->fetch_assoc()) {
                            echo "<option value='{$row_select['id']}'>{$row_select['titolo']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <br>
                <div class="text-center">
                    <button class="mt-5 px-5 fs-3 py-2 zoom3 btn btn-primary" type="submit" name="submit"">RIMUOVI LIBRO</button>
                </div>
            </form>
            
        </div>
            <button class=" mt-5 px-5 fs-5 py-2 zoom3 btn btn-primary" type="submit" name="submit">
                        <a href="./aggiungi_libro.php" class="nav-link">TORNA ALL'AGGIUNTA LIBRI</a>
                    </button>
                </div>



                <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>