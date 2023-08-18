<?php
 Include 'src/Model/connection.php';
// TODO: Faire que ce code se ressemble avec ce que je dois faire pour la registration.
require_once "src/Model/connection.php";

 function ageIsValid(DateTime $date2){
     $now_date = new DateTime();
     $interval = $date2->diff($now_date);
     $age = $interval->y;
     return age > 18;
 }

// Define variables and initialize with empty values
$first_name= $last_name = $email = $born= $average= $password = $confirm_password = "";
$first_name_err = $last_name_err = $email_err = $born_err = $average_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate email
    $email_err = (empty(trim($_POST["email"]))) ? "Please enter a email." : "";
    $email_err = (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL))? "Please, enter a valid email.": "";
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
    $first_name_err = (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["first_name"]))) ? "First name can only contain letter." : "";


    $last_name_err = (empty(trim($_POST["last_name"]))) ? "Please enter your last name." : "";
    $last_name_err = (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["first_name"]))) ? "Last name can only contain letter." : "";


    $born_err = (empty($_POST["born_date"])) ? "Your born date is required." : "";
    $born_err = (!ageIsValid($_POST["born_date"])) ? "For this type of inscription you must come with your parents." : "";

    $average_err = (empty(trim($_POST["average"]))) ? "This field is required." : "";
    $average_err = (trim($_POST["average"]) >= 100) ? "La moyenne ne dois pas deppasser 100" : "";


    if(empty(trim($_POST["first_name"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = :username";

        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }


    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";

        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);

            // Set parameters
            $param_username = $username;
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
    unset($pdo);
}
?>