<?php
    $id = $_SESSION["id"];
    $first_name = $_SESSION["first_name"];
    $last_name = $_SESSION["last_name"];
    $sql = "SELECT notification, avatar FROM etudiant WHERE id_student = $id";
    $result = $conn->query($sql);
    $avatar = $result['avatar'];
    $notification = $result["notification"];
?>


<div class="container login-form" >
    <div class="logout-form-header">
        <?php
        echo "<h1 id='username'>$first_name $last_name</h1>";
        ?>
    </div>
    <div class="links">
        <a href="results.php">Resultats</a>
        <a href="none.php">Modifier profil</a>
    </div>
</div>