<?php
set_include_path(".;C:\wamp64\www\projetphp");
require_once 'src/CONSTANTS.php';
require_once "src/Model/connection.php";
$username = USER_NAME;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../static_files/admin.css">
    <title><?php echo $username ?></title>
</head>
<body>
<header>
    <h1>CODELLA</h1>
    <div>
        <h3>boni</h3>
        <h3>bonii</h3>
        <h3>boniii</h3>
        <h3>boniiii</h3>
    </div>
</header>
<section>
    <form method="post" action="../controller/user_add.php" name="user_add" class="list-item">
        <?php
        include_once 'src/controller/user_list.php';
        $c = $count;
        for ($c = 0; $c < $count; $c++ ) {
            echo "
        <div class='user_container'>
            <div class='student_information'>
                <h1 class='student_name'>$first_name[$c] $last_name[$c]</h1>
                <div>
                    né le $born_date[$c] </br>
                    avec une moyenne generale de $general_average[$c]
                </div>
            </div>
            <div class='student_decision'>
                <input type=\"radio\" id=\"element2_admettre\" name=\"$ids[$c]\" value=\"admettre\">
                <label for=\"element2_accepter\">Admettre</label>
                <input type=\"radio\" id=\"element2_ajourner\" name=\"$ids[$c]\" value=\"Ajourner\">
                <label for=\"element2_refuser\">Ajourner</label><br>
            </div>
        </div>";
        }
        ?>
        <input type="submit" name="submition" id="submit_adding">
    </form>
</section>

</body>
</html>
