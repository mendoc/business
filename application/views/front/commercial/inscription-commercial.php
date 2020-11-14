<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>ECOLE 241 BUSINESS </title>
    <!-- <link rel="icon" href="favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="." />  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= theme_url() ?>/assets/css/inscription-commercial.css">
</head>

<body>
    <div class="container">
        <!--===*** À gauche ***===-->
        <div class="gauche">
            <div class="formulaire">

                <div class="formulaire-content">
                    <div id="inscris-toi">

                        <form action="<?= site_url('commercial/traitement_inscription') ?>" method="post">
                            <div class="logo">
                                <img src="<?= theme_url() ?>/assets/images/Ebusiness-logo.png" alt="logo de l'Ecole 241 BUSINESS">
                            </div>
                            <h1>Inscription commercial</h1>
                            <!--===*** Nom et prenom ***===-->
                            <div class="groupe-champ-de-saisie">

                                <div class="les-champs">
                                    <label><span class="etoile">*</span></label>
                                    <input type="text" name="nom" value="<?= set_value('nom') ?>" placeholder="Nom" class="input" required autofocus />
                                    <?= form_error('nom') ?>
                                </div>

                                <div class="les-champs">
                                    <input type="text" name="prenom" <?= set_value('prenom') ?> placeholder="Prénom" class="input" required autofocus />
                                    <?= form_error('prenom') ?>
                                </div>
                            </div>
                            <!--===*** Adresse mail ***===-->
                            <div class="les-champs">
                                <label><span class="etoile-mail">*</span></label>
                                <input type="email" name="email" value="<?= set_value('email') ?>" placeholder="Adresse mail" class="input" required autofocus />
                                <?= form_error('email') ?>
                            </div>
                            <!--===*** Date de naissance et choix du sexe ***===-->
                            <div class="groupe-champ-de-saisie">
                                <div class="les-champs">
                                    <input type="date" name="date_n" class="input" required autofocus />
                                </div>

                                <div class="les-champs">
                                    <div class="select">
                                        <select name="sexe" id="format">
                                            <option selected disabled>Sexe</option>
                                            <option value="H">Homme</option>
                                            <option value="F">Femme</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--===*** Numéro de téléphone ***===-->
                            <div class="groupe-champ-de-saisie">
                                <div class="les-champs">
                                    <label><span class="etoile">*</span></label>
                                    <input type="tel" name="num_tel" value="<?= set_value('num_tel') ?>" placeholder="N° de téléphone" class="input" required autofocus />
                                    <?= form_error('num_tel') ?>
                                </div>

                                <div class="les-champs">
                                    <label><span class="etoile">*</span></label>
                                    <input type="tel" name="num_what" <?= set_value('num_what') ?> placeholder="N° WhatsApp" class="input" required autofocus />
                                    <?= form_error('num_what') ?>
                                </div>
                            </div>

                            <!-- ===*** le nom utilisateur ***=== -->
                            <!-- <div class="les-champs">
                                <label><span class="etoile-mail">*</span></label>
                                <input type="text" placeholder="Nom utilisateur Ex. Maviogha" class="input" required autofocus />
                            </div> -->

                            <!-- ====*** les mots de passe ****=== -->
                            <div class="les-champs">
                                <label><span class="etoile-mail">*</span></label>
                                <input type="password" name="mot_passe" placeholder="Votre de passe" class="input" required autofocus />
                                <?= form_error('mot_passe') ?>
                            </div>

                            <div class="les-champs">
                                <label><span class="etoile-mail">*</span></label>
                                <input type="password" name="cmdp" placeholder="Confirmer votre mot de passe" class="input" required autofocus />
                                <?= form_error('cmdp') ?>
                            </div>

                            <!--===*** Confirmation de l'enregistrer des champs ***===-->
                            <button type="submit" class="bouton bouton-block">S'enregistrer</button>
                            <p class="animation a3">Si vous avez un compte, alors vous pouvez vous connecter <a href="<?= site_url('commercial/connexion') ?>">ici</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--===*** À droite ***===-->
        <div class="droite"></div>
    </div>
</body>

</html>