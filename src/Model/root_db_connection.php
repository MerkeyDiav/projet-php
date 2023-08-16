<?php
set_include_path(".;C:\wamp64\www\projetphp");
include_once 'create_db.php';
try {
    $conn = new PDO("mysql:host=". HOST .";dbname=". DB_NAME, ROOT, ROOT);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connexion reussie, youpi";
}
catch (PDOException $e){
    echo 'Erreur: ' . $e->getMessage();
}