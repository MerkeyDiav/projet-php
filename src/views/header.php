<? include_once "../controller/user_login.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" >
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="../../static_files/css/header.css">
    <script rel="script" defer src="../../static_files/js/logout.js"></script>
</head>
<body>
    <!-- header section starts -->
    <header class="header">
        <a href="#" class="logo"><i class="fas fa-book"></i> Unikin</a>
        <nav class="navbar">
            <a href="home.php" class="hover-underline">home</a>
            <a href="#about" class="hover-underline">A propos</a>
            <a href="#courses" class="hover-underline">cours</a>
            <a href="photo.php" class="hover-underline">photo</a>
            <a href="#review" class="hover-underline">review</a>
            <a href="#blog" class="hover-underline">blog</a>
            <a href="#contact" class="hover-underline">contact</a>
        </nav> 

        <div class="icons">
            <?php
            if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                echo "<div id='logout-btn'></div>";
            }else{
                echo "<div id=\"login-btn\" class=\"fas fa-user\"></div>";
            }
            ?>
            <div id="menu-btn" class="fas fa-bars"></div>
        </div> 

        <!-- login form -->
        <?php
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            require_once 'logout_form.php';
        }else{
            require_once 'login_form.php';
        }
        ?>
<!--TODO: IL FAUT PENSER A FAIRE LE FORM VALIDATION COTE CLIENT-->


    </header>

    <!-- header section ends -->




    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- custom js -->
    <script src="../../static_files/js/header.js"></script>
</body>
</html>