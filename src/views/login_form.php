<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="login-form" >
    <h3>Se connecter</h3>
    <input type="email" placeholder="entrer votre email" class="box" name="email">
    <input type="password" placeholder="entrer votre mot de passe" class="box" name="password">
    <div class="remember">
        <input type="checkbox" name="" id="remember">
        <label for="remember-me">remember me</label>
    </div>
    <button type="submit" href="#" class="btn">
        <span class="text text-1">Se connecter</span>
        <span class="text text-2" aria-hidden="true">Se connecter</span>
    </button>
    <div class="sign-txt">Vous n'avez pas un compte ? <a href="inscrire.php">S'inscrire</a></div>
</form>
