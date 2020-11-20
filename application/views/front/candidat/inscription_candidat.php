<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Formulaire inscription candidat - Ecole 241 Business</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= theme_url() ?>assets/css/inscription-candidat1.css">

    <?php if (ENVIRONMENT !== 'development') :?> 
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

        <script>
            (function(h,o,t,j,a,r){
                h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                h._hjSettings={hjid:2094197,hjsv:6};
                a=o.getElementsByTagName('head')[0];
                r=o.createElement('script');r.async=1;
                r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                a.appendChild(r);
            })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
        </script>

        <!-- Facebook Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '166742078436085');
        fbq('track', 'PageView');
        fbq('track', 'ViewContent');
        fbq('track', 'Lead');
        </script>
        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=166742078436085&ev=PageView&noscript=1"
        /></noscript>
        <!-- End Facebook Pixel Code -->
    <?php endif; ?>

</head>

<body>
    <div class="container">
        <!--===*** À gauche ***===-->
        <div class="gauche">
            <div class="formulaire">
                <form action="<?= site_url('candidat/traitement_enregistrement') ?>" method="post">
                    <?php if (isset($this->session->hash)) : ?>
                        <input type="hidden" name="hash" value="<?= $this->session->hash ?>">
                    <?php endif; ?>
                    <div class="logo">
                        <img src="<?= theme_url() ?>assets/images/Ebusiness-logo.png" alt="logo de l'Ecole 241 BUSINESS">
                    </div>
                    <h1>Inscription candidat</h1>
                    <!--===*** Nom et prenom ***===-->
                    <div class="groupe-champ-de-saisie">

                        <div class="les-champs">
                            <label  classe="label1"><span class="etoile1">*</span></label>
                            <input type="text" name="nom" value="<?= set_value('nom') ?>" placeholder="Nom & Prenom" class="input" required autofocus />
                            <div class="erreurs">
                            <?= form_error('nom') ?>
                            </div>
                        </div>
                        <div class="les-champs">
                        <label classe="label1"><span class="etoile1">*</span></label>
                        <input type="email" name="email" value="<?= set_value('email') ?>" placeholder="Adresse mail" class="input" required autofocus />
                        <div class="erreurs">
                         <?= form_error('email') ?>
        
                        </div>
                    </div>
                    
                                
                                
                

                        <!-- <div class="les-champs">
                            <input type="text" name="prenom" value="<?= set_value('prenom') ?>" placeholder="Prénom" class="input" required autofocus />
                            <div class="erreurs">
                              <?= form_error('prenom') ?>
                            </div>
                        </div> -->
                    </div>
                    <!--===*** Adresse mail ***===-->
                  


                    <!--==** Date de naissance **== -->

                    <!-- <div class="les-champs">
                          -->
                        <!-- <div class="input-group">
                            ** ========= Les jours du mois : 31 jours max ============ **-->
                           
                            <!-- <div class="choix">
                            
                             <div class="couleur"><span class="etoile1">*</span></div>
                                <select name="jour" id="jour" class="selection" required>
                                    <option selected disabled>Jour</option>
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
                                    <option>31</option>
                                </select>
                            </div> -->
                            <!--** ========= Les mois de l'année : 12 mois ============ **-->
                            
                        <!-- <div class="erreurs">
                            <?= form_error('annee') ?>
                        </div>
                        <div class="erreurs">
                            <?= form_error('mois') ?>
                        </div>
                        <div class="erreurs">
                            <?= form_error('jour') ?>
                        </div> -->
                    <!-- </div> -->

                   <div class="champ">
                   <div class="po" >
                   <label class="label2 " for="text">Date de naissance jj-mm-aaa</label>
                   <span class="etoile2">*</span>
                    <input  class="input2" type="text" id="text" name="text" placeholder="19-05-1998">
                   </div>

                   </div>
                    <!--===*** Date de naissance et choix du sexe ***===-->
                    <div class="groupe-champ-de-saisie">
                        <div class="les-champs">
                         
                            <div class="select">
                                <div class="couleur"><span class="etoile1">*</span></div>
                                <select name="sexe" required>
                                    <!-- <option selected disabled>Sexe</option> -->
                                    <option selected  value="H"> Homme</option>
                                    <option value="F">Femme</option>
                                </select>
                            </div>
                            <?= form_error('sexe') ?>
                        </div>
                    </div>
                    <!--===*** Numéro de téléphone ***===-->
                    <div class="groupe-champ-de-saisie">
                        <div class="les-champs">
                            <label classe="label1"><span class="etoile1">*</span></label>
                            <input type="tel" name="telephone" value="<?= set_value('telephone') ?>" placeholder="N° de téléphone" class="input" required autofocus />
                            <div class="erreurs">
                             <?= form_error('telephone') ?>
                            </div>
                        </div>

                        <div class="les-champs">
                            <!-- <label><span class="etoile">*</span></label> -->
                            <input type="tel" name="num_what" value="<?= set_value('num_what') ?>" placeholder="N° WhatsApp" class="input" autofocus />
                            <div class="erreurs">
                                <?= form_error('num_what')?>
                            </div>
                        </div>
                    </div>
                    <!--===*** Date de naissance et choix du sexe ***===-->
                    <div class="groupe-champ-de-saisie">
                        <div class="les-champs">
                            <div class="select">
                                <select name="domaine">
                                    <option selected disabled>Votre activité</option>
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
                                    <option value="Gaming">Industrie créative / Jeux vidéo</option>
                                    <option value="Photographie">Portrait photographie et paysage</option>
                                    <option value="Halieutique">Pêche</option>
                                    <option value="Education">Education</option>
                                    <option value="Agriculture">Agricole</option>
                                    <option value="Artisanat">Artisanat</option>
                                    <option value="Maroquerie">Maroquerie</option>
                                    <option value="Finance">Micro finance</option>
                                    <option value="Autre">Autres</option>
                                </select>
                            </div>
                            <?= form_error('domaine') ?>
                        </div>

                        <div class="les-champs">
                            <div class="select">
                             <div class="couleur"><span class="etoile1">*</span></div>
                                <select name="horaire" required>
                                    <option selected disabled>Horaire</option>
                                    <option>Matin</option>
                                    <option>Après-midi</option>
                                </select>
                            </div>
                            <?= form_error('horaire') ?>
                        </div>
                    </div>
                    <!--===*** Type de formation ***===-->
                    <div class="groupe-champ-de-saisie">
                        <div class="les-champs ">
                            <div class="select type-de-formation">
                             <div class="couleur"><span class="etoile1">*</span></div>
                                <select name="type_cours">
                                    <option selected disabled>Type de cours</option>
                                    <option value="P">En présentiel - 155.000fcfa</option>
                                    <option value="L">En ligne - 90.000fcfa</option>
                                </select>
                            </div>
                            <?= form_error('type_cours') ?>
                        </div>
                    </div>
                    <!--===*** Les attentes ***===-->
                    <div class="les-champs">
                        <label classe="label1"><span class="etoile1"></span></label>

                        <textarea type="text" name="attentes" placeholder="Vos attentes pour la formation" class="textarea" autofocus><?= set_value('attentes') ?></textarea>
                    </div>
                    <!--===*** Confirmation de l'enregistrer des champs ***===-->
                    <button type="submit" class="bouton bouton-block">S'enregistrer</button>
                </form>
            </div>
            <p class="msg-confidentiel">
                En cliquant sur "S'enregistrer", vous nous autorisez à utiliser vos informations
                à des fins <strong>commerciales</strong> (Appels, e-mails etc)
            </p>
        </div>
        <!--===*** À droite ***===-->
        <div class="droite"></div>
    </div>
</body>

</html>