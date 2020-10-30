<!DOCTYPE html>
<html>

<head>
    <title>403 Forbidden</title>
</head>

<body>

    <form action="<?= site_url('candidat/traitement_candidat') method='POST' ?>">


        <div class="bloc_mail">
            <label for="mail">Votre adresse e-mail:</label>
            <input placeholder="Exemple: moussouvalbus@gmail.com" type="e-mail" id="mail" name="email">
        </div>
        <div class="btnEnvoi"><input class="last_1" type="submit" value="Envoyer"></div>
    </form>

</body>

</html>