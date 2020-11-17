<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecole 241 Business</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

</head>


<body style=" background-color: #f4f4f4;
        font-size: 10px;
        line-height: 1.3;
        font-family: 'Arial', serif;
        font-family: 'Montserrat', sans-serif;" >

    <header style=" width: 100%;
        height: 200px;
        background-color: #003366;
        position: relative;" >
    </header>
    <!--# Début du container #--->
    <main class="container"  style=" position: relative;
        max-width: 750px;
        border-radius: 5px;
        margin: 0 auto;
        top: -100px;
        background-color: #ffffff;
        padding-bottom: 3.1em;
        " >
        <div class="main-content" style="width: 80%;
        margin: 0 auto;"  >
            <div class="logo">
                <img src="<?= theme_url() ?>assets/images/Ebusiness.png" alt="logo ECOLE 241 BUSINESS" 
                    style="  margin: auto;
                        display: flex;
                        justify-items: center;
                        justify-content: center;
                        padding-top: 2em;"
                 width="260px" height="180px">
            </div>
            <h1 class="title" style="display: inline-block;
            width: 95%;
            text-align: center;
            margin: 20px 0;
            letter-spacing: 3px;
            font-size: 35px;
            margin-bottom: 0.60em;"  >Votre retrait</h1>
            <!--# le message 1 #--->
            <p class="first-text" style="margin-bottom: 10px;
            padding-top: 2em; font-size: 1rem;">Bonjour {NOM},</p>
            <p class="second-text " style="margin-top: 30px;
              margin-bottom: 20px; font-size: 1rem;">Vous avez retiré de votre compte </p>
            <!--# le message 2 #--->
            <p class="third-text" style="margin-top: 20px;
             margin-bottom: 20px; font-size: 1rem;">Votre solde est de </p>
            <p class="third-text" style="margin-top: 20px;
             margin-bottom: 20px; font-size: 1rem;"  >Rappel de vos informations </p>
            <p class="second-text"  style="margin-top: 30px;
              margin-bottom: 20px; font-size: 1rem;">Lien de connexion : <a href="{LIEN}" style="text-decoration: none;
              color: var(--main-text-color);">{LIEN}</a></p>
            <p class="third-text" style="margin-top: 20px;
             margin-bottom: 20px; font-size: 1rem;">Adresse e-mail : {EMAIL}</p>
            <!--# le message 3 #--->
            <p class="second-text" style="margin-top: 30px;
              margin-bottom: 20px; font-size: 1rem;" >Mot de passe : {PASS}</p>
            <!--# button d'accès au tableau de bord #--->
            <a class="confirm-account" href="{LIEN}"  style=" display: block;
            width: 180px;
            text-align: center;
            margin: 0 auto;
            background-color: #003366;
            text-decoration: none;
            color: #ffffff;
            font-size: 16px;
            font-weight: bold;
            padding: 11px 30px;
            margin-top: 2.50em;
            margin-bottom: 2.50em;
            border-radius: 5px;"  >Accéder au tableau de bord</a>
            <!--# le message 4 #--->
            <p class="name-team team-2" style=" font-family: 'Montserrat', sans-serif;
            font-style: italic;
            margin-bottom: 4em; font-size: 1rem;">L'équipe Ecole 241 Business.</p>
        </div>
    </main>

    <!--# les coordonnées de l'ECOLE 241 BUSINESS #--->
    <footer class="container footer-right" style="justify-content: space-between; background-color: #ff0000;">
        <section class="container need-help" style="top: -50px;
        background-color: #003366;
        padding: 5px 0;
        justify-content: space-between;
        text-align: center;
        justify-content: center;">
            <div class="sec-2">
                <p class="mb-15" style="font-size: 12px;  color: #ffffff;
         font-weight: bold;"><a>Ogooue Labs - Avenue François Xavier POUNEDIAN</a></p>
                <p class="mb-15" style="font-size: 12px;  color: #ffffff;
        font-weight: bold;"><a>Ancienne SOBRAGA (descente en face de Multipress) Libreville - GABON</a></p>
                <p class="mb-15" style="font-size: 12px;  color: #ffffff;
        font-weight: bold;"><a>B.P: 2839 - Tel : +241 077 850 352 / +241 065 358 392 / contact@ecole241.org</a></p>

            </div>
        </section>
        <div class="sec-3">
            <ul class="d-flex" style="display: flex;
                justify-content: center;
                align-items: center;
                 width: 90%;
                margin: 0 auto;
                background-color: #ff0000;
                font-size: 14px;
                color: grey;
                font-weight: bold;
                padding-top: 1rem;
                padding-bottom: 1em; list-style-type: none;">
                <li class="mr-20" style="margin-right: 20px;" >
                    <a href="/"><i class="fab fa-instagram large" style="font-size: 1.1rem;  font-size: 1rem;
                 color: #ffffff;"></i></a>
                </li>
                <li class="mr-20" style="margin-right: 20px;" >
                    <a href="/"><i class="fab fa-linkedin-in large" style="font-size: 1.1rem;  font-size: 1rem;
                color: #ffffff;"></i></a>
                </li>
                <li class="mr-20" style="margin-right: 20px;  color: #ffffff;">
                    <a href="/"><i class="fab fa-facebook-f large" style="font-size: 1.1rem; font-size: 1rem;
                 color: #ffffff;"></i></a>
                </li>
            </ul>
        </div>
    </footer>
    <!--# fin du container #--->

</body>

</html>