<?php
SESSION_START();


// const SERVER = "localhost";
// const DB = "shopGB_l4";
// const LOGIN = "root";
// const PASS = "";

// $connect = mysqli_connect(SERVER, LOGIN, PASS, DB);
// $connectPDO = new PDO('mysql:host=localhost;dbname=shopGB_l4', 'root', '');

try {
    $connectPDO = new PDO('mysql:host=localhost;dbname=shopGB_l4', 'root', '');
} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage();
    die();
}

// установка error режима
$connectPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
