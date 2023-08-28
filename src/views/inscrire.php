<?php include_once "../controller/user_registration.php"?>

<!DOCTYPE html>
<!---Coding By CodingLab | www.codinglabweb.com--->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>S'inscrire</title>
    <!---Custom CSS File--->
    <link rel="stylesheet" href="../../static_files/css/inscrire.css" />
    <script rel="script" src="../../static_files/js/inscrire.js" defer></script>
  </head>
  <body>
  <?php require "header.php" ?>

    <section class="container">
      <header>Enregistrement</header>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" novalidate class="form registration">
          <div class="input-box address">
            <label>Identites</label>
            <div class="column">
              <input type="text" placeholder="Entrez votre nom" required name="first_name" />
                <?php
                if (isset($first_name)){
                    echo "<p>non non</p>";
                }
                ?>
              <input type="text" placeholder="Entrer votre prenom" required name="last_name" />
                <input type="file" id="avatar" value="Entrez " name="picture"/>
            </div>
          </div>
        
          <div class="input-box">
            <label>Address mail</label>
            <input type="text"
                   placeholder="Entrez votre address mail"
                   id="mail"
                   class="form-control <?php echo (!empty($email_error)) ? 'is-valid': '' ?> "
                   minlength="10" required name="email"/>
              <span aria-live="polite"
                    class="error <?php echo (!empty($email_error)) ? 'active': ''?>"
              >
                  <?php echo (!empty($email_error)) ? $email_error: null ?>
              </span>
          </div>

          <div class="column">
            <div class="input-box">
              <label>Mot de passe</label>
              <input type="password"
                     placeholder="Entrer votre mot de passe"
                     minlength="8"
                     id="password"
                     required
                     name="password" />
              <span aria-live="polite"
                    class="error <?php echo (!empty($email_error)) ? 'active': ''?>"
              >
                <?php echo (!empty($email_error)) ? $email_error: null ?>
              </span>
            </div>
            <div class="input-box">
              <label>Confirmer mot de passe </label>
              <input type="password" placeholder="confirmer le mot de passe" minlength="8" id="confirm_password" required name="confirm_password" />
              <span aria-live="polite" class="error"></span>
            </div>
          </div>

          <div class="gender-box">
            <h3>Genre</h3>
            <div class="gender-option">
              <div class="gender">
                <input type="radio" id="check-male" value="M" name="gender" checked />
                <label for="check-male">Masculin</label>
              </div>
              <div class="gender">
                <input type="radio" id="check-female" value="F" name="gender" />
                <label for="check-female">Feminin</label>
              </div>
          </div>
        </div>

        <div class="input-box address">
          <div class="column">
            <div class="select-box">
                <label for="select">select</label>
              <select id="select" name="choix">
                <?php include_once "../controller/fac_list.php"?>
              </select>
            </div>
            <input type="date" id="anniversaire" placeholder="Date d'anniversaire" value="2000-01-01" name="born_date" required />
            <input type="file">

          </div>
        </div>
          <button type="submit" value="S'inscrire">S'inscrire</button>
        <div class="sign-txt">Vous avez deja un compte ? <a href="home.php">Se connecter</a></div>
      </form>
    </section>
  </body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    include_once "../controller/user_registration.php";
}