<?php
set_include_path(".;C:\wamp64\www\projetphp");
$ids = require_once 'user_list.php';
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    foreach ($ids as $id) {
        if (isset($_POST["$id"])){
            $admittion_verdict = $_POST["$id"];
            $stmt = $conn->prepare("UPDATE etudiant SET decision = :decision WHERE id_student = :id");
            $stmt->bindParam(":id", $id_student);
            $stmt->bindParam(":decision", $verdict);
            $id_student = $id;
            $verdict = ($admittion_verdict === "admettre") ? "admis" : "ajourné";
            $stmt->execute();
        }

    }
}

header("location: ../../src/views/admin.php");
exit;