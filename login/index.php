<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrement</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="conf.php" class="sign-in-form" >
                    <h2 class="title">Se connecter</h2>
                    <div class="input-field">
                        <i class="fa fa-user"></i>
                        <input type="text" placeholder="Nom d'utilisateur">
                    </div>
                    <div class="input-field">
                        <i class="fa fa-lock"></i>
                        <input type="password" placeholder="Mot de passe ">
                    </div>
                    <input type="submit" value="Login" class="btn solid">

                    <p class="social-text">ou inscrivez-vous sur les plateformes sociales</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-tiktok"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                    </div>
                </form>

                <form action="" class="sign-up-form">
                    <h2 class="title">S'inscrire</h2>
                    <div class="input-field">
                        <i class="fa fa-user"></i>
                        <input type="text" placeholder="Nom d'utilisateur">
                    </div>
                    <div class="input-field">
                        <i class="fa fa-envelope"></i>
                        <input type="text" placeholder="Adresse email">
                    </div>
                    <div class="input-field">
                        <i class="fa fa-lock"></i>
                        <input type="password" placeholder="mot de passe">
                    </div>
                    <input type="submit" value="Sign up" class="btn solid">

                    <p class="social-text">ou inscrivez-vous sur les plateformes sociales </p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-tiktok"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Nouveau ici ?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                        Illum architecto neque rerum.</p>
                        <button class="btn transparent" id="sign-up-btn">Sign up</button>
                </div>
                <img src="images/launch.svg" alt="" class="image">
            </div> 
            
            <div class="panel right-panel">
                <div class="content">
                    <h3>Vous avez un compte ?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                        Illum architecto neque rerum.</p>
                        <button class="btn transparent" id="sign-in-btn">Se connecter </button>
                </div>
                <img src="images/play.svg" alt="" class="image">
            </div>
        </div>
    </div>
    <script src="js/style.js"></script>
</body>
</html>