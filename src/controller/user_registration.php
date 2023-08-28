<?php
// TODO: Faire que ce code se ressemble avec ce que je dois faire pour la registration.

function ageIsValid($date2){
    $date2 = new DateTime("$date2");
    $now_date = new DateTime("now");
    $interval = $date2->diff($now_date);
    $age = $interval->y;
    return $age > 18;
}

function createFolder(String $s){
    // Vérifier si le dossier de destination existe, sinon le créer
    if (!is_dir($s)) {
        mkdir($s, 0777, true);
    }
}

// Define variables and initialize with empty values
$first_name= $last_name = $email = $sexe = $choix = $born= $bulletin = $avatar= $password = $confirm_password = "";
$first_name_err = $last_name_err = $email_err = $born_err = $average_err = $password_err = $confirm_password_err = "";
require_once "../Model/connection.php";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate email
    $first_name_err = (empty(trim($_POST["first_name"]))) ? "Please enter your first name." : "";
    $first_name_err = (!preg_match('/^[a-zA-Z]+$/', trim($_POST["first_name"]))) ? "First name can only contain letter." : "";

    $last_name_err = (empty(trim($_POST["last_name"]))) ? "Please enter your last name." : "";
    $last_name_err = (!preg_match('/^[a-zA-Z]+$/', trim($_POST["last_name"]))) ? "Last name can only contain letter." : "";

    $born_err = (empty($_POST["born_date"])) ? "Your born date is required." : "";
    $born_err = (!ageIsValid($_POST["born_date"])) ? "For this type of inscription you must come with your parents." : "";

    $sexe = trim($_POST["sexe"]);
    $choix = trim($_POST["choix"]);

    $bulletin_folder_path = '../../assets/documents/bulletins/';
    $avatar_folder_path = '../../assets/avatars/';
    createFolder($bulletin_folder_path);
    createFolder($avatar_folder_path);
    $extension = pathinfo($_FILES['bulletin']['name'], PATHINFO_EXTENSION);
    $new_name = $first_name . '_' . $email . "_bulletin.". $extension;
    $bulletin = $bulletin_folder_path . $new_name;

    if ($_FILES["avatar"]["size"] > 0){
        $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $new_name = $first_name . '_' . $email . "_avatar.". $extension;
        $avatar = $bulletin_folder_path . $new_name;
    } else {
        $avatar = $sexe === 'M' ? 'maculin_photo.png' : "feminin_photo.png";
    }


    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar)) {
        echo 'Fichier enregistré avec succès.';
    } else {
        echo 'Une erreur s\'est produite lors de l\'enregistrement du fichier.';
    }

    if (move_uploaded_file($_FILES['bulletin']['tmp_name'], $bulletin)) {
        echo 'Fichier enregistré avec succès.';
    } else {
        echo 'Une erreur s\'est produite lors de l\'enregistrement du fichier.';
    }


    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a email.";
    } elseif(!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)){
        $email_err = "Please, enter a valid email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM etudiant WHERE student_email = :student_email";

        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":student_email", $param_email, PDO::PARAM_STR);

            // Set parameters
            $param_email = trim($_POST["email"]);

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $email_err = "This email address is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }


    // Validate password
    $password_err = (empty(trim($_POST["password"]))) ? "Please enter a password." : "";
    $password_err = (strlen(trim($_POST["password"])) < 8) ? "Password must have at least 8 characters." : "";


    // Validate confirm password
    $confirm_password_err = (empty(trim($_POST["confirm_password"]))) ? "Please confirm password": "";
    $confirm_password_err = ((empty($password_err)) && ($password != trim($_POST["confirm_password"]))) ? "Password did not match" : "";


    $last_name = (empty($last_name_err)) ? trim($_POST["last_name"]): "";
    $first_name = (empty($first_name_err)) ? $_POST["first_name"] : "";
    $born = (empty($born_err)) ? $_POST["born_date"]: "";
    $password = (empty(trim($password_err))) ? trim($_POST["password"]): "";
    $confirm_password = empty(trim($confirm_password_err)) ?  trim($_POST["confirm_password"]) : "";
    // Check input errors before inserting in database
    if(
        empty($email_err) &&
        empty($last_name_err) &&
        empty($first_name_err) &&
        empty($born_err) &&
        empty($password_err) &&
        empty($confirm_password_err)
    ){
        echo "bonsoir";

        // Prepare an insert statement
        $sql = "INSERT INTO `etudiant` (first_name, last_name, born_date, student_email, password, bulletin, avatar, sexe, choix) VALUES (:firstname, :last_name, :born_date, :student_email, :password, :bulletin, :avatar, :sexe, :choix)";

        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":first_name", $param_first_name, PDO::PARAM_STR);
            $stmt->bindParam(":last_name", $param_last_name, PDO::PARAM_STR);
            $stmt->bindParam(":born_date", $param_born_date, PDO::PARAM_STR);
            $stmt->bindParam(":student_email", $param_student_email, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            $stmt->bindParam(":bulletin", $param_bulletin, PDO::PARAM_STR);
            $stmt->bindParam(":avatar", $param_avatar, PDO::PARAM_STR);
            $stmt->bindParam(":sexe", $param_sexe, PDO::PARAM_STR);
            $stmt->bindParam(":choix", $param_choix, PDO::PARAM_STR);

            // Set parameters
            $param_first_name = $first_name;
            $param_last_name = $last_name;
            $param_born_date = $born;
            $param_student_email = $email;
            $param_bulletin= $bulletin;
            $param_avatar = $avatar;
            $param_choix = $choix;
            $param_sexe = $sexe;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: results.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }
    // Close connection
    unset($conn);
}
?>