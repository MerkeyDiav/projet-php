<?php
/*TODO: Pour l'authetification de l'admin, juste creer une condition suffit
    et une redirection. Pas de niveau de securité de la Nasa dans un tp de UNIKIN
*/


session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]=== true){
    header('location: admin.php');
    exit;
}

include_once 'src/CONSTANTS.php';
$username_err = $confirm_password_err = $password_err = '';
$username = $confirm_password = $password = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = (empty(trim($_POST["username"]))) ? "": trim($_POST['username']);
    $username_err = (empty(trim($_POST["username"]))) ? "Please enter username": "";

    $password = (empty(trim($_POST["password"]))) ? "": trim($_POST['password']);
    $password_err = (empty(trim($_POST["password"]))) ? "Please enter password": "";
    if (empty($username_err) && empty($password_err)){
        if ($username === USER){
            if (password_verify($password, USER_PASSWORD)){
                session_start();
                $_SESSION["loggedin"] = true;
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $password;
                header("location: views/admin_dashbord.php");
            } else {
                $loggin_err = "Invalid username or password.";
            }
        } else {
            $loggin_err = "Invalid username or password.";
        }
    } else {
        echo "Oops something went wrong.";
    }
}

