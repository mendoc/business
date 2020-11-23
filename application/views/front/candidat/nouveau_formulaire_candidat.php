<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= theme_url() ?>assets/css/new_form_candidat.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>Formulaire Inscription Candidat - Ecole241 Business</title>
</head>

<body>
    <main>
        <div class="contenaire">
            <header>
                <div class="logo">
                    <img src="<?= theme_url() ?>assets/images/blue.png" alt=" logo Ecole241 Business" width="130px" height="90px">
                </div>
                <div class="retour">
                    <a href="<?= site_url('welcome') ?>"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAABX0lEQVRoQ+2YzW3DMAyFyQmaTZpj2lORBZoNmjnSHnrJHM4kVY/ZqD9GzYIGBAiB7Nh9MioC9NUgxe896ckwk/GHjc9PDvDfDroD7gCogG8hUEC43B2AJQQbuANjAm6e307n43YPijxavogDD69h9fHdNcy8Ox+3i6wRqYo374dvJTDRWhcxBXB/COsf7odfRYXMANy9hF0n0qTDm3Fgcwh7Ymlyp616BzRpiOhpKCqqBUiTZiznqgS4TBpTALmkMQMwlDQlb9q5W27yRTaWNA6QKLCYA7qGbiER0di8Kal62mtRAF1ID3HH8j4VYu5Ac4WZfAbSxhqjn20PcXttwSoBdGiF+GrlJESPZmI0N6jZT4kUxvTHXAQZSqhqz0BuO+USyhRAPNxpQpkDuEwokwBxe5n9rXLtciv5/k83cckB0F4OgCqI1rsDqIJovTuAKojWuwOogmi9O4AqiNb/Ar0ckjGewR2jAAAAAElFTkSuQmCC" /></a>
                </div>
            </header>

            <!-- ===============* espace travail *================ -->

            <div class="page">

                <!-- ==============* partie formulaire *============= -->
                <div class="gauche">


                    <h1 class="titre">S'inscrire à la formation</h1>
                    <form action="<?= site_url('candidat/traitement_enregistrement_form2') ?>" class="formulaire" method="POST">
                        <?php if (isset($this->session->hash)) : ?>
                            <input type="hidden" name="hash" value="<?= $this->session->hash ?>">
                        <?php endif; ?>
                        <!-- =====* Nom et prénom *======== -->
                        <div class="saisie">
                            <label for="nom-complet">Votre nom Complet <span>*</span></label><br>
                            <input type="text" name="nom" id="nom-complet" value="<?= set_value('nom') ?>" required placeholder="Ex: MOUSSIROU Grégoire" class="input" autofocus>

                        </div>
                        <div class="erreurs">
                          <?= form_error('nom') ?>
                        </div>
                        <!-- ========* e-mail *========== -->
                        <div class="saisie">

                            <label for="e-mail"> Votre adresse e-mail <span>*</span></label><br>
                            <input type="email" name="email" id="e-mail" value="<?= set_value('email') ?>" required placeholder="Ex moussirougregoire@gmail.com" class="input" autofocus>

                        </div>
                        <div class="erreurs">
                         <?= form_error('email') ?>
                        </div>
                        <!-- ===========* choix genre *============= -->
                        <div class="saisie choix display-flex">
                            <div class="genre-choix">Genre<span>*</span></div>
                            <div>
                                <label for="genre" selected class="choix-genre">Homme</label>
                                <input type="radio" checked name="sexe" value="H" id="genre" required autofocus>
                            </div>
                            <div>
                                <label for="femme" class="choix-genre">Femme</label>

                                <input type="radio" name="sexe" value="F" id="femme" required autofocus>

                            </div>
                            <div class="erreurs">
                            <?= form_error('sexe') ?>
                            </div>
                        </div>

                        <!-- ==========* Numéros de téléphone *=========== -->

                        <div class="saisie num">
                            <div class="num-tel">

                                <label for="phone">Votre n° de téléphone <span>*</span></label><br>
                                <input type="tel" name="telephone" id="phone" value="<?= set_value('telephone') ?>" required class="input" autofocus placeholder="Ex: +241 00 00 00">

                            </div>
                            <div class="erreurs">
                                <?= form_error('telephone') ?>
                            </div>
                            <!-- <div class="num-what">
                                <label for="phone">N° de Whatsapp:</label><br>
                                <input type="tel" name="" id="phone" required class="input" autofocus placeholder="votre numéro Whatsapp">
                            </div> -->
                        </div>

                        <!-- ============* choix du domaine d'activité et de type de cours a suivre *========== -->
                        <div class="saisie choix-activ-cours">
                            <div class="choix-activite">
                                <!-- ==========* choix activité *========= -->
                                <label for="activite">Votre activité<span>*</span></label><br>
                                <select name="domaine" id="activite">
                                    <!-- <option selected disabled>Votre activité</option> -->
                                    <option value="Agroalimentaire">Agroalimentaire</option>
                                    <option value="Communication">Communication</option>
                                    <option value="Informatique">Informatique</option>
                                    <option value="Transaport">Transaport</option>
                                    <option value="Textile">Textile</option>
                                    <option value="Automobile">Automobile</option>
                                    <option value="Industrie-pharmaceutique"> Industrie pharmaceutique</option>
                                    <option value="Électronique">Électronique</option>
                                    <option value="Commerce">Commerce / Négoce / Distribution</option>
                                    <option value="BTP"> BTP / Matériaux de construction</option>
                                    <option value="Santé"> Santé</option>
                                    <option value="Banque">Banque / Assurance</option>
                                    <option value="Bois"> Bois / Papier / Carton / Imprimerie</option>
                                    <option value="Études">Études et conseils</option>
                                    <option value="Services">Services aux entreprises</option>
                                    <option selected value="Autre">Autres</option>
                                </select>
                            </div>
                            <div class="erreurs">
                             <?= form_error('domaine') ?>
                            </div>
                            <!-- =========* choix du cours *=========-->
                            <div class="choix-cours">
                                <label for="cours">Type de Cours<span>*</span></label><br>
                                <select name="type_cours" id="cours">
                                    <option selected value="P">En présentiel - 155.000fcfa</option>
                                    <option value="L">En ligne - 90.000fcfa</option>
                                </select>
                                <div class="erreurs">
                                 <?= form_error('type_cours') ?>
                                </div>
                            </div>

                            <!-- =========* choix des modalites *=========-->
                            <div class="choix-cours">
                                <label for="modalite">Modalite de paiement<span>*</span></label><br>
                                <select name="modalite" id="modalite">

                                    <option selected value="1">1 Tranche</option>

                                    <option value="2">2 Tranche</option>
                                    <option value="3">3 Tranche</option>
                                </select>
                                <div class="erreurs">
                                 <?= form_error('modalite') ?>
                                </div>
                            </div>
                        </div>
                        <!-- ===========* boutin s'Enregistrer *========== -->
                        <div class="btn">
                            <button type="submit" class="btn-enregistrer">S'enregistrer</button>
                        </div>
                    </form>
                    <div class="confidentiel">
                        <p>
                            En cliquant sur <strong> "S'enregistrer"</strong>, vous nous autorisez à utiliser vos informations à des fins <strong>commerciales</strong> (Appels, e-mails etc)
                        </p>
                    </div>
                </div>

                <!-- =============* partie droit *============== -->
                <div class="droite">
                    <div class="contenair">
                        <!-- <div class="texte-descriptif">
                            <h1>Etes-vous prêt?</h1>
                            <p> La transformation digitale de votre activité est un atout incroyable à votre essor</p>
                        </div> -->

                        <div class="image">
                            <img src="<?= theme_url() ?>assets/images/ambassadeurs.png" alt=" Ambassadeurs Ecole241 Business">
                        </div>
                    </div>
                </div>

            </div>


        </div>
        </div>
        <!-- =====================* pied de page *============== -->
        <footer>
            <div class="footer-contenair">
                <p>&copy Copyright Ecole241Business</p>
                <a href="https://ecole241.org" class="footerBadge footerBadge--production">Réalisé par <span>Ecole 241</span></a>
            </div>
        </footer>
    </main>

    <script>
        const typeCoursElt = document.getElementById('cours');
        const modaliteElt = document.getElementById('modalite');
        typeCoursElt.onchange = e => {
            if (e.target.value == 'L') {
                modaliteElt.setAttribute('disabled', true);
                modaliteElt.value = "1"
            } 
            else {
                modaliteElt.removeAttribute('disabled');
            } 
        }
    </script>

</body>

</html>