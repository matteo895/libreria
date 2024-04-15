<?php
//configurazione di accesso al database

$servername = "localhost";
//oppure inserisci il nome del server MYSQL
$username = "root";
//oppure username MYSQL
$password = "";
//oppure la tua passweord MYSQL
$dbname = "gestione_libreria";
//inserisci nome del database 

//connessione al database 
$conn = new mysqli($servername, $username, $password, $dbname);

//verifica della connessione 
if ($conn->connect_error) {
    die("Connessione al database fallita:" . $conn->connect_error);
}
