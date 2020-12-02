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
        margin-bottom: 0.20em;
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

    /* Button de confirmation */
    /*main div.main-content a.confirm-account {
        display: block;
        width: 180px;
        text-align: center;
        margin: 0 auto;
        background-color: #003366;
        text-decoration: none;
        color: #ffffff;
        font-size: 17px;
        font-weight: bold;
        padding: 11px 30px;
    }
    */

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
        padding: 5px;
        border: 1px solid #ccc;
        text-align: left;
        font-size: 13px;
    }

    td span {
        color: #003366;
    }

    /* LISTE */
    li {
        font-size: .8rem;
        line-height: 17px;
    }

    @media screen and (min-width: 375px) and (max-width: 667px) {
        div.main-content .logo img {
            width: 53%;
            height: 100px;
        }

        main div.main-content h1 {
            margin: 20px 0;
            margin-bottom: 1em;
        }

        div.main-content p.first-text {
            margin-bottom: 1px;
            padding-top: 0.60em;
        }

        main div.main-content p.second-text {
            margin-top: 10px;
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

    @media screen and (min-width: 150px) and (max-width: 399px) {
        main div.main-content h1 {
            font-size: 19px;
        }

        table {
            width: 20%;
        }

        .mb-15 a {
            font-size: 10px;
        }
    }

    @media screen and (min-width: 320px) and (max-width: 400px) {
        table {
            width: 100%;
        }

        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        tr {
            border: 1px solid #ccc;
        }

        td {
            /* Behave  like a "row" */
            border-bottom: 1px solid #eee;
            position: relative;
            color: #003366;
            text-align: center;
        }

        td:before {
            /* Now like a table header */
            position: absolute;
            /* Top/left values mimic padding */
            top: 6px;
            left: 6px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
            /* Label the data */
            content: attr(data-column);
            color: #ccc;
            font-weight: bold;
        }
    }

    @media screen and (min-width: 320px) and (max-width: 638px) {

        td,
        th {
            font-size: 11px;
        }

        div.main-content .logo img {
            width: 53%;
            height: 100px;
        }

        main div.main-content h1 {
            margin: 20px 0;
            margin-bottom: 1em;
        }

        div.main-content p.first-text {
            margin-bottom: 1px;
            padding-top: 0.60em;
        }

        main div.main-content p.second-text {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        main div.main-content p.third-text {
            margin-top: 1px;
            margin-bottom: 2px;
        }
    }

    @media screen and (min-width: 400px) and (max-width: 743px) {
        table {
            width: 60%;
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
        font-size: 10px;
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
        <!----<span class="circle"></span>---->
    </header>
    <main class="container">
        <div class="main-content">
            <div class="logo">
                <img src="<?= theme_url() ?>images/logoecole241.png" alt="logo ECOLE 241 BUSINESS" width="260px" height="180px">
            </div>
            <h1 class="title">Inscription enregistrée</h1>
            <!-----<a class="confirm-account" href="#">Confirmez votre inscription</a>----->
            <p class="first-text">Bonjour {GENRE} {NOM}</p>
            <p class="second-text">Nous avons bien recu votre inscription au programme de formation Ecole 241 Business destiné aux commerçants et artisans.</p>
            <p class="third-text">Ci-dessous, les informations que vous avez fournies lors de votre enregistrement.</p>


            <table>

                <tbody>
                    <tr>
                        <td><span>Nom</span></td>
                        <td><span>{NOM}</span></td>
                    </tr>
                    <tr>
                        <td>sexe</td>
                        <td>{SEXE}</td>
                    </tr>
                    <tr>
                        <td><span>Date de naissance</span></td>
                        <td><span>{DATE}</span></td>
                    </tr>
                    <tr>
                        <td>Adresse mail</td>
                        <td>{EMAIL}</td>
                    </tr>
                    <tr>
                        <td><span>Numéro de téléphone</span></td>
                        <td><span>{TEL}</span></td>
                    </tr>
                    <tr>
                        <td>Numéro WhatsApp</td>
                        <td>{WHATSAPP}</td>
                    </tr>
                    <tr>
                        <td><span>Horaire</span></td>
                        <td><span>{HEURE}</span></td>
                    </tr>
                    <tr>
                        <td>Domaine d'activité</td>
                        <td>{DOMAINE}</td>
                    </tr>
                    <tr>
                        <td><span>Type de service</span></td>
                        <td><span>{SERVICE}</span></td>
                    </tr>
                    <tr>
                        <td>Attentes</td>
                        <td>{ATTENNTES}</td>
                    </tr>
                </tbody>
            </table>

            <p>Vous êtes attendu dans les locaux de Ogooué Labs pour compléter votre dossier et finaliser votre paiement.</p>
            <p class="name-team">Merci pour la confiance accordée, nous vous disons à bientôt</p>
            <p class="name-team team-2">L'équipe Ecole 241 Business.</p>
        </div>
    </main>


    <footer class="container footer-right">
        <section class="container need-help">
            <div class="sec-2">
                <p class="mb-15"><a>Ogooue Labs - Avenue François Xavier POUNEDIAN</a></p>
                <p class="mb-15"><a>Ancienne SOBRAGA (descente en face de Multipress) Libreville - GABON</a></p>
                <p class="mb-15"><a>B.P: 2839 - Tel : +241 077 850 352 / +241 065 358 392 / business@ecole241.org</a></p>

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

</body>

</html>