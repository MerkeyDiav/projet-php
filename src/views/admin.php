<?php
set_include_path(".;C:\wamp64\www\projetphp");
require_once 'src/CONSTANTS.php';
require_once "src/Model/connection.php";
$username = USER_NAME;
echo "bonsoir";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $username ?></title>
</head>
<body>
<?php
include_once 'header.php';
$sql = "SELECT * FROM etudiant";

$resultat = $conn->query($sql);
while($ligne = $resultat->fetch()){

    foreach ($ligne as $item => $value) {
        echo " $value <br>";
    }
}
?>

</body>
</html>
