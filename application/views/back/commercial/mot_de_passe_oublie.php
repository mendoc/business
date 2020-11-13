<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= theme_url() ?>/assets/css/connexion_commercial.css">
    <title>Mot de passe oublié commercial</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-in-container">

            <form action="<?= site_url('commercial/traitement_mot_de_passe') ?>" method='post'>
                <img src="<?= theme_url() ?>assets/images/blue.png" alt="Image de fond" width="150px">
                <h1 class="h1">Rénitialiser le  mot de passe</h1>
                <?php if ($this->session->flashdata('message-error')) : ?>
                    <p style="padding: 5px 10px; font-weight: bold; color: red; margin:0;"><?= $this->session->flashdata('message-error'); ?></p>
                <?php endif; ?>
                <input type="email" placeholder="Adresse e-mail" name="email" required/>
                <button type="submit">Réinitialiser</button>
                <a href="<?= site_url('commercial/inscription') ?>">Se connecter ?</a>
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
                    <h1>Mot de passe oublié!</h1>
                    <p>Entrez votre adresse e-mail pour réinitialiser votre mot de passe.</p>
                    <!-- <button class="ghost" id="signUp">SE CONNECTER</button> -->
                </div>
            </div>
        </div>
    </div>

</body>

</html>