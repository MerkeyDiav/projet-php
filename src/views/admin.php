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
    <script rel="script" defer src="../../static_files/js/admin.js"></script>
    <link rel="stylesheet" href="../../static_files/css/admin.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <title><?php echo $username ?></title>
</head>
<body>
<header>
    <h1>BACKOFFICE</h1>
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
                <div class='admettre_etudiant'>
                    <input type=\"radio\" id=\"admettre\" name=\"$ids[$c]\" value=\"admettre\">
                    <label for=\"admettre\">Admettre</label>
                </div>
                <div class='ajourner_etudiant'>
                    <input type=\"radio\" id=\"ajourner\" name=\"$ids[$c]\" value=\"Ajourner\">
                    <label for=\"ajourner\">Ajourner</label><br>
                </div>
                <div class='attente_etudiant'>
                    <input type=\"radio\" id=\"attente\" checked name=\"$ids[$c]\" value=\"Ajourner\">
                    <label for=\"attente\">En attente</label><br>
                </div>
            </div>
        </div>";
        }
        ?>
        <input type="submit" name="submition" id="submit_adding">
    </form>
</section>
</body>
</html>
