<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= theme_url() ?>assets/css/connexion_commercial.css">
    <title>Formulaire</title>

    <style>
        body {
            background-image: url(<?= theme_url() ?>assets/images/fond-connexion-gest.jpg);
        }

    </style>
    <!-- Hotjar Tracking Code for https://business.ecole241.org -->
    <!-- <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:2094197,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script> -->
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-in-container">

            <form action="<?= site_url('gestionnaire/traitement_connexion') ?>" method='post'>
                <img src="<?= theme_url() ?>assets/images/blue.png" alt="Image de fond" width="150px">
                <h1 class="h1">Connexion</h1>
                <?php if ($this->session->flashdata('message')) : ?>
                    <p style="padding: 5px 10px; font-weight: bold; color: red; margin:0;"><?= $this->session->flashdata('message'); ?></p>
                <?php endif; ?>
                <input type="email" placeholder="Adresse e-mail" name="email" required value="<?= $this->session->flashdata('email'); ?>" />
                <input type="password" placeholder="Mot de passe" name="password" required />
                
                <div class="souvenir">
                    <label for="souvenir" class="btn-souvenir">Se souvenir de moi</label>
                    <input type="checkbox" name="souvenir" id="souvenir" class="check-btn" checked>
                </div>

                <a href="#">Mot de passe oublié ?</a>
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
                    <p>Connectez-vous pour vous connecter à votre tableau de bord.</p>
                    <!-- <button class="ghost" id="signUp">SE CONNECTER</button> -->
                </div>
            </div>
        </div>
    </div>

</body>

</html>