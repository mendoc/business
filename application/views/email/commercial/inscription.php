<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECOLE 241 BUSINESS</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

</head>



<body style="
min-width:100%;
background-color: #f4f4f4;
font-size: 10px;
font-family: 'Arial', serif;
height:auto;
margin: 0 auto;
font-family: 'Montserrat', sans-serif;
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;1,600&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');
">

    <header style="width: 100%;
    height:50px;
    background-color: #003366;
    position: relative;">
    </header>
    <!--# Début du container #--->
    <main style="position: relative;
    max-width: 100%;
    border-radius: 5px;
    margin: 0 auto;
    background-color: white ;
    border: solid white;">
        <div style="width: 80%;
        margin: 0 auto;">

            <div class="logo">
                <img style="margin: auto;
                display: flex;
                justify-items: center;
                justify-content: center;
                padding-top: 2em;" src="<?= theme_url() ?>/assets/images/Ebusiness.png" width="260" height="180" alt="logo de l'Ecole 241 BUSINESS">
            </div>
            <h1 style=" display: inline-block;
            width: 95%;
            text-align: center;
            margin: 20px 0;
            letter-spacing: 3px;
            font-size: 35px;
            margin-bottom: 0.60em" class=" title ">Votre compte a été créé</h1>
            <!--# le message 1 #--->
            <p style="margin-bottom: 10px;
            padding-top: 2em;font-size: 1rem;">{NOM}</p>
            <p style=" margin-top: 30px;
            margin-bottom: 20px;font-size: 1rem;">Votre compte gestionnaire a bien été créé.</p>
            <!--# le message 2 #--->
            <p style="margin-top: 20px;
            margin-bottom: 20px;font-size: 1rem;">Ci-dessous, les informations pour vous connecter.</p>
            <p style=" margin-top: 30px;
            margin-bottom: 20px;font-size: 1rem; word-wrap: break-word;">Lien de connexion : https://business.ecole241.org/index.php/commercial/connexion</p>
            <p style="margin-top: 20px;
            margin-bottom: 20px;font-size: 1rem;">Adresse e-mail : {EMAIL}</p>
            <!--# le message 3 #--->
            <p style=" margin-top: 30px;
            margin-bottom: 20px; font-size: 15px;">Mot de passe : {mot_passe}</p>
            <p style="margin-top: 20px;
            margin-bottom: 20px;font-size: 1rem;">Adresse e-mail : {EMAIL}</p>
            <!--# button d'accès au tableau de bord #--->
            <a style=" display: block;
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
            border-radius: 5px;text-decoration: none;
        ;" href="https://business.ecole241.org/index.php/commercial/connexion">Accéder au tableau de bord</a>
            <!--# le message 4 #--->
            <p class="name-team " style="font-size: 1rem;font-family: 'Montserrat', sans-serif; font-style: italic; margin-bottom: 4em; ">L'équipe Ecole 241 Business.</p>
        </div>
    </main>

    <!--# les coordonnées de l'ECOLE 241 BUSINESS #--->
    <footer style=" position: relative;
    width:100%;
   
    border-radius: 5px;
    margin: 0 auto;
    background-color:#d10000ed;
    justify-content: space-between;">
        <section style=" top: -50px;
        background-color: #003366;
        padding: 5px 0;
        justify-content: space-between;
        text-align: center;
        justify-content: center;
        position: relative;
        width: 100%;
        border-radius: 5px;
        margin: 0 auto;
        ">
            <div style="color: #ffff; font-weight:bold;" class=" sec-2 ">
                <p style="font-size: 1rem; margin: 1px; "><a style="font-size: 10px;text-decoration: none; color: var(--main-text-color); " href="/ ">Ogooue Labs - Avenue François Xavier POUNEDIAN</a></p>
                <p style="font-size: 1rem;  margin: 1px; "><a style="font-size: 10px;text-decoration: none; color: var(--main-text-color); " href="/ ">Ancienne SOBRAGA (descente en face de Multipress) Libreville - GABON</a></p>
                <p style="font-size: 1rem; margin: 1px; "><a style="font-size: 10px;text-decoration: none; color: var(--main-text-color); " href="/ ">B.P: 2839 - Tel : +241 077 850 352 / +241 065 358 392 / contact@ecole241.org</a></p>

            </div>


        </section>
    </footer>
    <!--# fin du container #--->

</body>

</html>