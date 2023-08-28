<?php
set_include_path(".;C:\wamp64\www\projetphp");
include_once 'src/Model/connection.php';
$sql = "SELECT * FROM etudiant WHERE decision = 'attente'";

$resultat = $conn->query($sql);
$ids = $decision = $first_name = $last_name = $born_date = $general_average = array();
$count = 0;
while ($ligne = $resultat->fetch()) {
    $ids[] = $ligne["id_student"];
    $first_name[] = $ligne["first_name"];
    $last_name[] = $ligne["last_name"];
    $born_date[] = $ligne["born_date"];
    $general_average[] = $ligne["general_average"];
    $decision[] = ($ligne["decision"]);
    $count += 1;
}

return $ids;
