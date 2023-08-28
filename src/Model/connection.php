<?php
//set_include_path(".;C:\wamp64\www\projetphp");
include_once "../CONSTANTS.php";
//include_once 'create_db.php';
try {
    $conn = new PDO("mysql:host=". HOST .";dbname=". DB_NAME, ROOT, ROOT_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
    echo 'Erreur: ' . $e->getMessage();
}

