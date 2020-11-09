<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecole 241 Business</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;1,600&display=swap');
    body {
        background-color: #f4f4f4;
        font-size: 10px;
        line-height: 1.3;
        font-family: 'Arial', serif;
        font-family: 'Montserrat', sans-serif;
    }
    
    header {
        width: 100%;
        height: 200px;
        background-color: #003366;
        position: relative;
    }
    
    .container {
        position: relative;
        max-width: 750px;
        border-radius: 5px;
        margin: 0 auto;
    }
    
    main {
        top: -100px;
        background-color: #ffffff;
        padding-bottom: 3.1em;
    }
    
    main div.main-content {
        width: 80%;
        margin: 0 auto;
    }
    
    main div.main-content h1 {
        display: inline-block;
        width: 95%;
        text-align: center;
        margin: 20px 0;
        letter-spacing: 3px;
        font-size: 35px;
        margin-bottom: 0.60em;
    }
    
    div.main-content p.first-text {
        margin-bottom: 10px;
        padding-top: 2em;
    }
    
    main div.main-content p.second-text {
        margin-top: 30px;
        margin-bottom: 20px;
    }
    
    main div.main-content p.third-text {
        margin-top: 20px;
        margin-bottom: 20px;
    }
    
    section.need-help {
        top: -50px;
        background-color: #003366;
        padding: 30px 0;
        display: flex;
    }
    
    .team-2 {
        font-family: 'Montserrat', sans-serif;
        font-style: italic;
        margin-bottom: 4em;
    }
    /* Button de confirmation */
    
    main div.main-content a.confirm-account {
        display: block;
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
        border-radius: 5px;
    }
    /*######## Tableaux recapitulatif #########*/
    
    table {
        width: 560px;
        border-collapse: collapse;
        margin: 40px auto;
    }
    
    tr:nth-of-type(odd) {
        background: #ccc;
    }
    
    td,
    th {
        padding: 10px;
        border: 1px solid #ccc;
        text-align: left;
        font-size: 12px;
    }
    
    td span {
        color: #003366;
    }
    /* 
*/
    
    @media screen and (min-width: 375px) and (max-width: 667px) {
        div.main-content .logo img {
            width: 53%;
            height: 100px;
        }
        main div.main-content h1 {
            margin: 20px 0;
            margin-bottom: 2em;
        }
        div.main-content p.first-text {
            margin-bottom: 1px;
            padding-top: 1.60em;
        }
        main div.main-content p.second-text {
            margin-top: 24px;
            margin-bottom: 10px;
        }
        main div.main-content p.third-text {
            margin-top: 10px;
            margin-bottom: 20px;
        }
        .mb-15 a {
            font-size: 10px;
        }
    }
    
    @media screen and (min-width: 375px) and (max-width: 667px) {
        div.main-content .logo img {
            width: 53%;
            height: 100px;
        }
        .mb-15 a {
            font-size: 10px;
        }
    }
    
    @media screen and (min-width: 150px) and (max-width: 399px) {
        main div.main-content h1 {
            font-size: 1.5rem;
            margin-bottom: -0.2em;
        }
        .mb-15 a {
            font-size: 10px;
        }
    }
    
    @media screen and (min-width: 150px) and (max-width: 568px) {
        div.main-content p.first-text {
            width: 230px;
            overflow: hidden;
        }
        main div.main-content p.second-text {
            width: 230px;
            overflow: hidden;
        }
        main div.main-content p.third-text {
            width: 230px;
            overflow: hidden;
        }
        .mb-15 a {
            font-size: 10px;
        }
    }
    /*######## Footer / container #########*/
    
    div.main-content .logo img {
        margin: auto;
        display: flex;
        justify-items: center;
        justify-content: center;
        padding-top: 2em;
    }
    
    section.need-help {
        top: -50px;
        background-color: #003366;
        padding: 5px 0;
        justify-content: space-between;
        text-align: center;
        justify-content: center;
    }
    
    section.need-help a {
        color: #ffffff;
        font-weight: bold;
    }
    
    footer div.footer-content {
        width: 90%;
        margin: 0 auto;
        background-color: #ff0000;
        font-size: 14px;
        color: grey;
        font-weight: bold;
    }
    
    footer div.footer-content ul.navegacion a {
        color: black;
        font-weight: bold;
        font-size: 16px;
    }
    /* GLOBAL */
    
    .important {
        color: black;
    }
    
    p {
        font-size: 1rem;
    }
    
    p.large {
        font-size: 2rem;
    }
    
    ul {
        list-style-type: none;
    }
    
    a {
        text-decoration: none;
        color: var(--main-text-color);
    }
    /*
-- Utils
*/
    
    .d-flex {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: -2.90em;
        padding-bottom: 1em;
    }
    
    .mr-20 {
        margin-right: 20px;
    }
    
    .mb-15 {
        font-size: 9px;
    }
    /*
-- Icon
*/
    
    i {
        font-size: 1rem;
        color: var(--main-text-color);
    }
    
    i.large {
        font-size: 1.1rem;
    }
    /*
-- Nav
*/
    /*
-- Footer
*/
    
    footer {
        background-color: #ff0000;
    }
    
    .footer-right {
        justify-content: space-between;
    }
    
    footer a,
    footer i {
        color: #ffffff;
    }
    
    footer a:hover,
    footer a:hover i {
        color: #ffffff;
    }
</style>

<body>

    <header>
    </header>
    <!--# Début du container #--->
    <main class="container">
        <div class="main-content">
            <div class="logo">
                <img src="<?= theme_url() ?>assets/images/Ebusiness.png" alt="logo ECOLE 241 BUSINESS" width="260px" height="180px">
            </div>
            <h1 class="title">Votre compte a été créé</h1>
            <!--# le message 1 #--->
            <p class="first-text">Bonjour {NOM},</p>
            <p class="second-text">Votre compte gestionnaire a bien été créé.</p>
            <!--# le message 2 #--->
            <p class="third-text">Ci-dessous, les informations pour vous connecter.</p>
            <p class="second-text">Lien de connexion : <a href="{LIEN}">{LIEN}</a></p>
            <p class="third-text">Adresse e-mail : {EMAIL}</p>
            <!--# le message 3 #--->
            <p class="second-text">Mot de passe : {PASS}</p>
            <!--# button d'accès au tableau de bord #--->
            <a class="confirm-account" href="{LIEN}">Accéder au tableau de bord</a>
            <!--# le message 4 #--->
            <p class="name-team team-2">L'équipe Ecole 241 Business.</p>
        </div>
    </main>

    <!--# les coordonnées de l'ECOLE 241 BUSINESS #--->
    <footer class="container footer-right">
        <section class="container need-help">
            <div class="sec-2">
                <p class="mb-15"><a>Ogooue Labs - Avenue François Xavier POUNEDIAN</a></p>
                <p class="mb-15"><a>Ancienne SOBRAGA (descente en face de Multipress) Libreville - GABON</a></p>
                <p class="mb-15"><a>B.P: 2839 - Tel : +241 077 850 352 / +241 065 358 392 / contact@ecole241.org</a></p>

            </div>
        </section>
        <div class="sec-3">
            <ul class="d-flex">
                <li class="mr-20">
                    <a href="/"><i class="fab fa-instagram large"></i></a>
                </li>
                <li class="mr-20">
                    <a href="/"><i class="fab fa-linkedin-in large"></i></a>
                </li>
                <li class="mr-20">
                    <a href="/"><i class="fab fa-facebook-f large"></i></a>
                </li>
            </ul>
        </div>
    </footer>
    <!--# fin du container #--->

</body>

</html>