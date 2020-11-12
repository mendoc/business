<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>ECOLE 241 BUSINESS </title>
    <link rel="icon" href="<?= theme_url() ?>favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="<?= theme_url() ?>favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= theme_url() ?>assets/css/inscription-commercial.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= theme_url() ?>assets/css/font-awesome.min.css">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-4D8CEC5J5T"></script>
    <script>
        window.dataLayer = window.dataLayer || [];​
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());​
        gtag('config', 'G-4D8CEC5J5T');
    </script>
</head>

<body>
    <div class="container">
        <!--===*** À gauche ***===-->
        <div class="gauche">
            <div class="formulaire">

                <div class="formulaire-content">
                    <div id="inscris-toi">

                        <form action="/" method="post">
                            <a class="btn-retour" href="<?= site_url('/')?>"><i class="fa fa-arrow-left" aria-hidden="true"></i> </a>
                            <div class="logo">
                                <img src="<?= theme_url() ?>/assets/images/Ebusiness-logo.png" alt="logo de l'Ecole 241 BUSINESS">
                            </div>
                            <h1>Inscription commercial</h1>
                            <!--===*** Nom et prenom ***===-->
                            <div class="groupe-champ-de-saisie">

                                <div class="les-champs">
                                    <label><span class="etoile">*</span></label>
                                    <input type="text" name="nom" placeholder="Nom" class="input" required autofocus />
                                </div>

                                <div class="les-champs">
                                    <input type="text" name="prenom" placeholder="Prénom" class="input" required autofocus />
                                </div>
                            </div>
                            <!--===*** Adresse mail ***===-->
                            <div class="les-champs">
                                <label><span class="etoile-mail">*</span></label>
                                <input type="email" placeholder="Adresse mail" class="input" required autofocus />
                            </div>

                            <!--==** Date de naissance **== -->

                            <div class="les-champs">
                                <div class="input-group">
                                    <!--** ========= Les jours du mois : 31 jours max ============ **-->
                                    <div class="choix">
                                        <select name="format" id="format" class="selection">
                                            <option selected disabled>Jour</option>
                                            <!--** 1 à 10 **-->
                                            <option>01</option>
                                            <option>02</option>
                                            <option>03</option>
                                            <option>04</option>
                                            <option>05</option>
                                            <option>06</option>
                                            <option>07</option>
                                            <option>08</option>
                                            <option>09</option>
                                            <option>10</option>
                                            <!--** 1 à 10 **-->
                                            <option>11</option>
                                            <option>12</option>
                                            <option>13</option>
                                            <option>14</option>
                                            <option>15</option>
                                            <option>16</option>
                                            <option>17</option>
                                            <option>18</option>
                                            <option>19</option>
                                            <option>20</option>
                                            <!--** 1 à 10 **-->
                                            <option>21</option>
                                            <option>22</option>
                                            <option>23</option>
                                            <option>24</option>
                                            <option>25</option>
                                            <option>26</option>
                                            <option>27</option>
                                            <option>28</option>
                                            <option>29</option>
                                            <option>30</option>
                                            <!--** 1 **-->
                                            <option>31</option>
                                            <!--** Total = 31 **-->
                                        </select>
                                    </div>
                                    <!--** ========= Les mois de l'année : 12 mois ============ **-->
                                    <div class="choix">
                                        <select name="format" id="format" class="selection">
                                            <option selected disabled>Mois</option>
                                            <option value="janvier">Janvier</option>
                                            <option value="Février">Février</option>
                                            <option value="Mars">Mars</option>
                                            <option value="Avril">Avril</option>
                                            <option value="Mai">Mai</option>
                                            <option value="Juin">Juin</option>
                                            <option value="Juillet">Juillet</option>
                                            <option value="Août">Août</option>
                                            <option value="Septembre">Septembre</option>
                                            <option value="Octobre">Octobre</option>
                                            <option value="Novembre">Novembre</option>
                                            <option value="Décembre">Décembre</option>
                                        </select>
                                    </div>
                                    <!--** ========= Les années : de 1960 à 2020 ============ **-->
                                    <div class="choix">
                                        <select name="format" id="format" class="selection">
                                            <option selected disabled>Année</option>
                                            <!--** 1 à 10 **-->
                                            <option>1960</option>
                                            <option>1961</option>
                                            <option>1962</option>
                                            <option>1963</option>
                                            <option>1964</option>
                                            <option>1965</option>
                                            <option>1966</option>
                                            <option>1967</option>
                                            <option>1968</option>
                                            <option>1969</option>
                                            <!--** 1 à 10 **-->
                                            <option>1970</option>
                                            <option>1971</option>
                                            <option>1972</option>
                                            <option>1973</option>
                                            <option>1974</option>
                                            <option>1975</option>
                                            <option>1976</option>
                                            <option>1977</option>
                                            <option>1978</option>
                                            <option>1979</option>
                                            <!--** 1 à 10 **-->
                                            <option>1980</option>
                                            <option>1981</option>
                                            <option>1982</option>
                                            <option>1983</option>
                                            <option>1984</option>
                                            <option>1985</option>
                                            <option>1986</option>
                                            <option>1987</option>
                                            <option>1988</option>
                                            <option>1989</option>
                                            <!--** 1 à 10 **-->
                                            <option>1990</option>
                                            <option>1991</option>
                                            <option>1992</option>
                                            <option>1993</option>
                                            <option>1994</option>
                                            <option>1995</option>
                                            <option>1996</option>
                                            <option value="8">1997</option>
                                            <option>1998</option>
                                            <option>1999</option>
                                            <!--** 1 à 10 **-->
                                            <option>2000</option>
                                            <option>2001</option>
                                            <option>2002</option>
                                            <option>2003</option>
                                            <option>2004</option>
                                            <option>2005</option>
                                            <option>2006</option>
                                            <option>2007</option>
                                            <option>2008</option>
                                            <option>2009</option>
                                            <!--** 1 à 10 **-->
                                            <option>2010</option>
                                            <option>2011</option>
                                            <option>2012</option>
                                            <option>2013</option>
                                            <option>2014</option>
                                            <option>2015</option>
                                            <option>2016</option>
                                            <option>2017</option>
                                            <option>2018</option>
                                            <option>2019</option>
                                            <option>2020</option>
                                        </select>
                                    </div>
                                </div>
                            </div>





                            <!--===*** Date de naissance et choix du sexe ***===-->
                            <div class="groupe-champ-de-saisie">
                                <!-- <div class="les-champs">
                                    <input type="date" class="input" required autofocus />
                                </div> -->

                                <div class="les-champs">
                                    <div class="select">
                                        <select name="format" id="format">
                                            <option selected disabled>Sexe</option>
                                            <option value="Homme">Homme</option>
                                            <option value="Femme">Femme</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--===*** Numéro de téléphone ***===-->
                            <div class="groupe-champ-de-saisie">
                                <div class="les-champs">
                                    <label><span class="etoile">*</span></label>
                                    <input type="tel" name="téléphone" placeholder="N° de téléphone" class="input" required autofocus />
                                </div>

                                <div class="les-champs">
                                    <label><span class="etoile">*</span></label>
                                    <input type="tel" name="whatsApp" placeholder="N° WhatsApp" class="input" required autofocus />
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
                                <input type="password" placeholder="Votre de passe" class="input" required autofocus />
                            </div>

                            <div class="les-champs">
                                <label><span class="etoile-mail">*</span></label>
                                <input type="password" placeholder="Confirmer votre mot de passe" class="input" required autofocus />
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