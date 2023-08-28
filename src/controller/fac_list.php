<?php
include_once "../Model/connection.php";

$sql = "SELECT nom_faculte, creation_date FROM faculte";
$resulats = $conn->query($sql);

while ($ligne = $resulats->fetch()){
    $nom_faculte = ligne['nom_faculte'];
    $creation_date = $ligne["creation_date"];
    echo "<option title='$creation_date'>$nom_faculte</option>";
}