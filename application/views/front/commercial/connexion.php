<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= theme_url() ?>/assets/css/connexion_commercial.css">
    <title>Formulaire</title>
</head>
<body>
<div class="container" id="container">
    <div class="form-container sign-in-container">
        <form action="<?= site_url('commercial/traitement_connexion') ?>" method='post'>
            <h1 class="h1" >Connexion</h1>
            <img src="<?= theme_url() ?>assets/images/blue.png" alt="" width="150px">
            <input type="text" placeholder="nom d'utilisateur" name="nom_util" />
            <input type="password" placeholder="Mot de passe" name="mot_passe" />
            <a href="#">Mot de passe oublié?</a>
            <button type="submit">SE CONNECTER</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <!-- <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In</button> -->
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Bienvenue!</h1>
                <p>Entrez vos informations personnelles pour vous connecter à votre tableau de bord.</p>
                <!-- <button class="ghost" id="signUp">SE CONNECTER</button> -->
            </div>
        </div>
    </div>
</div>

</body>
</html>