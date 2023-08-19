<?php
// TODO: Faire que ce code se ressemble avec ce que je dois faire pour la registration.

function ageIsValid(DateTime $date2){
    $now_date = new DateTime();
    $interval = $date2->diff($now_date);
    $age = $interval->y;
    return age > 18;
}

// Define variables and initialize with empty values
$first_name= $last_name = $email = $born= $average= $password = $confirm_password = "";
$first_name_err = $last_name_err = $email_err = $born_err = $average_err = $password_err = $confirm_password_err = "";
require_once "src/Model/connection.php";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate email
//    else{
//        // Prepare a select statement
//        $sql = "SELECT id FROM users WHERE username = :username";
//
//        if($stmt = $conn->prepare($sql)){
//            // Bind variables to the prepared statement as parameters
//            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
//
//            // Set parameters
//            $param_username = trim($_POST["username"]);
//
//            // Attempt to execute the prepared statement
//            if($stmt->execute()){
//                if($stmt->rowCount() == 1){
//                    $username_err = "This username is already taken.";
//                } else{
//                    $username = trim($_POST["username"]);
//                }
//            } else{
//                echo "Oops! Something went wrong. Please try again later.";
//            }
//
//            // Close statement
//            unset($stmt);
//        }
//    }
    $first_name_err = (empty(trim($_POST["first_name"]))) ? "Please enter your first name." : "";
    $first_name_err = (!preg_match('/^[a-zA-Z]+$/', trim($_POST["first_name"]))) ? "First name can only contain letter." : "";

    $last_name_err = (empty(trim($_POST["last_name"]))) ? "Please enter your last name." : "";
    $last_name_err = (!preg_match('/^[a-zA-Z]+$/', trim($_POST["last_name"]))) ? "Last name can only contain letter." : "";

    $born_err = (empty($_POST["born_date"])) ? "Your born date is required." : "";
    $born_err = (!ageIsValid($_POST["born_date"])) ? "For this type of inscription you must come with your parents." : "";

    $average_err = (empty(trim($_POST["average"]))) ? "This field is required." : "";
    $average_err = (trim($_POST["average"]) >= 100) ? "La moyenne ne doit pas deppasser 100" : "";


    $last_name = (empty($last_name_err)) ? trim($_POST["last_name"]): "";
    $first_name = (empty($first_name_err)) ? $_POST["first_name"] : "";
    $born = (empty($born_err)) ? $_POST["born_date"]: "";
    $average = (empty($average_err)) ? $_POST['average']: "";
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a email.";
    } elseif(!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)){
        $email_err = "Please, enter a valid email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM etudiant WHERE student_email = :student_email";

        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":student_email", $param_username, PDO::PARAM_STR);

            // Set parameters
            $param_username = trim($_POST["email"]);

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
    $password_err = (strlen(trim($_POST["password"])) < 6) ? "Password must have atleast 6 characters." : "";
    $password = (empty(trim($password_err))) ? trim($_POST["password"]): "";


    // Validate confirm password
    $confirm_password_err = (empty(trim($_POST["confirm_password"]))) ? "Please confirm password": "";
    $confirm_password_err = ((empty($password_err)) && ($password != trim($_POST["confirm_password"]))) ? "Password did not match" : "";
    $confirm_password = empty(trim($confirm_password_err)) ?  trim($_POST["confirm_password"]) : "";

//    if(empty(trim($_POST["confirm_password"]))){
//        $confirm_password_err = "Please confirm password.";
//    } else{
//        $confirm_password = trim($_POST["confirm_password"]);
//        if(empty($password_err) && ($password != $confirm_password)){
//            $confirm_password_err = "Password did not match.";
//        }
//    }

    // Check input errors before inserting in database
    if(
        empty($email_err) &&
        empty($last_name_err) &&
        empty($first_name_err) &&
        empty($born_err) &&
        empty($average_err) &&
        empty($password_err) &&
        empty($confirm_password_err)
    ){

        // Prepare an insert statement
        $sql = "INSERT INTO `etudiant` (first_name, last_name, born_date, student_email, password, general_average) VALUES (:firstname, :first_name, :last_name, :born_date, :student_email, :password, :general_average)";

        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":first_name", $param_first_name, PDO::PARAM_STR);
            $stmt->bindParam(":last_name", $param_last_name, PDO::PARAM_STR);
            $stmt->bindParam(":born_date", $param_born_date, PDO::PARAM_STR);
            $stmt->bindParam(":student_email", $param_student_email, PDO::PARAM_STR);
            $stmt->bindParam(":general_average", $param_general_average, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);

            // Set parameters
            $param_first_name = $first_name;
            $param_last_name = $last_name;
            $param_born_date = $born;
            $param_student_email = $email;
            $param_general_average = $average;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: login.php");
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