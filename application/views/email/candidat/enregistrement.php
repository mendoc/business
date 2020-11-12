<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>Ecole 241 Business</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
</head>


<body style="background-color: #f4f4f4;
            font-size: 10px;
            line-height: 1.3;
            font-family: 'Montserrat', sans-serif;">

    <header style="width: 100%;
                  height: 200px;
                  background-color: #003366;
                  position: relative;">
        <!----<span class="circle"></span>---->
    </header>
    <main class="container" style="position: relative;
        max-width: 750px;
        border-radius: 5px;
        top: -100px;
        background-color: #ffffff;
        padding-bottom: 3.1em;
        margin: 0 auto;">

        <div class="main-content" style=" width: 80%;
        margin: 0 auto;">
            <div class="logo">
                <img src="<?= theme_url() ?>assets/images/Ebusiness.png" alt="logo ECOLE 241 BUSINESS" width="260px" height="180px" style="margin: auto;
    display: flex;
    justify-items: center;
    justify-content: center;
    padding-top: 2em;">
            </div>
            <h1 class="title" style="display: inline-block;
    width: 95%;
    text-align: center;
    margin: 20px 0;
    letter-spacing: 3px;
    font-size: 35px;
    margin-bottom: 0.20em;">Inscription enregistrée</h1>
            <!-----<a class="confirm-account" href="#">Confirmez votre inscription</a>----->
            <p class="first-text" style="margin-bottom: 10px;
            padding-top: 2em;
            font-size: 1.2rem;">Bonjour {GENRE} {NOM}</p>
            <p style="margin-top: 30px;
            margin-bottom: 20px; font-size: 1.2rem;" class="second-text">Nous avons bien recu votre inscription au programme de formation Ecole 241 Business destiné aux commerçants et artisans.</p>
            <p style="margin-top: 30px;
            margin-bottom: 20px; font-size: 1.2rem;" class="third-text">Ci-dessous, les informations que vous avez fournies lors de votre enregistrement.</p>


            <table style="width: 560px;
                border-collapse: collapse;
                margin: 40px auto;">

                <tbody>
                    <tr style="background: #ccc;">
                        <td style="padding: 5px;
                        border: 1px solid #ccc;
                        text-align: left;
                        font-size: 13px;">
                            <span style=" color: #003366;">Nom</span></td>
                        <td style="padding: 5px;
                        border: 1px solid #ccc;
                        text-align: left;
                         font-size: 13px;"><span style=" color: #003366;">{NOM}</span></td>
                    </tr>
                    <tr>
                        <td style="padding: 5px;
                        border: 1px solid #ccc;
                        text-align: left;
                         font-size: 13px;">sexe</td>
                        <td style="padding: 5px;
                        border: 1px solid #ccc;
                        text-align: left;
                         font-size: 13px;">{SEXE}</td>
                    </tr>
                    <tr style="background: #ccc;">
                        <td style="padding: 5px;
                        border: 1px solid #ccc;
                        text-align: left;
                        font-size: 13px;"><span style=" color: #003366;">Date de naissance</span></td>
                        <td style="padding: 5px;
                        border: 1px solid #ccc;
                        text-align: left;
                         font-size: 13px;"><span style=" color: #003366;">{DATE}</span></td>
                    </tr>
                    <tr>
                        <td style="padding: 5px;
                        border: 1px solid #ccc;
                        text-align: left;
                         font-size: 13px;">Adresse mail</td>
                        <td style="padding: 5px;
                        border: 1px solid #ccc;
                        text-align: left;
                         font-size: 13px;">{EMAIL}</td>
                    </tr>
                    <tr style="background: #ccc;">
                        <td style="padding: 5px;
                        border: 1px solid #ccc;
                        text-align: left;
                         font-size: 13px;"><span style=" color: #003366;">Numéro de téléphone</span></td>
                        <td style="padding: 5px;
                        border: 1px solid #ccc;
                        text-align: left;
                         font-size: 13px;"><span style=" color: #003366;">{TEL}</span></td>
                    </tr>
                    <tr>
                        <td style="padding: 5px;
                        border: 1px solid #ccc;
                        text-align: left;
                         font-size: 13px;">Numéro WhatsApp</td>
                        <td style="padding: 5px;
                        border: 1px solid #ccc;
                        text-align: left;
                         font-size: 13px;">{WHATSAPP}</td>
                    </tr>
                    <tr style="background: #ccc;">
                        <td style="padding: 5px;
                        border: 1px solid #ccc;
                        text-align: left;
                         font-size: 13px;"><span style=" color: #003366;">Horaire</span></td>
                        <td style="padding: 5px;
                        border: 1px solid #ccc;
                        text-align: left;
                         font-size: 13px;"><span style=" color: #003366;">{HEURE}</span></td>
                    </tr>
                    <tr>
                        <td style="padding: 5px;
                        border: 1px solid #ccc;
                        text-align: left;
                         font-size: 13px;">Domaine d'activité</td>
                        <td style="padding: 5px;
                        border: 1px solid #ccc;
                        text-align: left;
                         font-size: 13px;">{DOMAINE}</td>
                    </tr>
                    <tr style="background: #ccc;">
                        <td style="padding: 5px;
                        border: 1px solid #ccc;
                        text-align: left;
                         font-size: 13px;"><span style=" color: #003366;">Type de service</span></td>
                        <td style="padding: 5px;
                        border: 1px solid #ccc;
                        text-align: left;
                         font-size: 13px;"><span style=" color: #003366;">{SERVICE}</span></td>
                    </tr>
                    <tr>
                        <td style="padding: 5px;
                        border: 1px solid #ccc;
                        text-align: left;
                         font-size: 13px;">Attentes</td>
                        <td style="padding: 5px;
                        border: 1px solid #ccc;
                        text-align: left;
                         font-size: 13px;">{ATTENNTES}</td>
                    </tr>
                </tbody>
            </table>

            <p style="font-size: 1rem;">Vous êtes attendu dans les locaux de Ogooué Labs pour compléter votre dossier et finaliser votre paiement.</p>
            <p style="font-size: 1rem;" class="name-team">Merci pour la confiance accordée, nous vous disons à bientôt</p>
            <p class="name-team team-2" style="font-family: 'Montserrat', sans-serif;
        font-style: italic;
        margin-bottom: 4em; font-size: 1rem; color: #000;">L'équipe Ecole 241 Business.</p>
        </div>
    </main>


    <footer class="container footer-right" style="background-color: #ff0000;">
        <section style="top: -50px;
        background-color: #003366;
        text-align: center;
        justify-content: center;
        padding: 5px 0;" class="container need-help">
            <div class="sec-2">
                <p style="font-size: 13px;" class="mb-15"><a style="color: #ffffff;
        font-weight: bold;">Ogooue Labs - Avenue François Xavier POUNEDIAN</a></p>
                <p style="font-size: 13px;" class="mb-15"><a style="color: #ffffff;
        font-weight: bold;">Ancienne SOBRAGA (descente en face de Multipress) Libreville - GABON</a></p>
                <p style="font-size: 13px;" class="mb-15"><a style="color: #ffffff;
        font-weight: bold;">B.P: 2839 - Tel : +241 077 850 352 / +241 065 358 392 / contact@ecole241.org</a></p>

            </div>
        </section>

        <div class="sec-3">
            <ul style="display: flex;
             justify-content: center;
             align-items: center; padding: 1em; list-style-type: none; " class="d-flex">
                <li class="mr-20" style="margin-right: 20px;">
                    <a href="/"><i style="font-size: 1.1rem; color: #ffffff;" class="fab fa-instagram large"></i></a>
                </li>
                <li class="mr-20" style="margin-right: 20px;">
                    <a href="/"><i style="font-size: 1.1rem; color: #ffffff;" class="fab fa-linkedin-in large"></i></a>
                </li>
                <li class="mr-20" style="margin-right: 20px;">
                    <a href="/"><i style="font-size: 1.1rem; color: #ffffff;" class="fab fa-facebook-f large"></i></a>
                </li>
            </ul>
        </div>
    </footer>

</body>

</html>