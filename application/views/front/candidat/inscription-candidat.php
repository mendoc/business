<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Formulaire candidat - Ecole 241 Business</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= theme_url() ?>assets/css/inscription-candidat1.css">
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
</head>

<body>
    <div class="container">
        <!--===*** À gauche ***===-->
        <div class="gauche">
            <div class="formulaire">
                <form action="/" method="post">
                    <div class="logo">
                        <img src="<?= theme_url() ?>assets/images/Ebusiness-logo.png" alt="logo de l'Ecole 241 BUSINESS">
                    </div>
                    <h1>Inscription du candidat</h1>
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
                   
                    
                    <!--===*** Date de naissance et choix du sexe ***===-->
                    <div class="groupe-champ-de-saisie">
                        <div class="les-champs">
                            <input type="date" class="input" required autofocus />
                        </div>

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
                    <!--===*** Date de naissance et choix du sexe ***===-->
                    <div class="groupe-champ-de-saisie">
                        <div class="les-champs">
                            <div class="select">
                                <select name="format" id="format">
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
                                          <option value="Bois">  Bois / Papier / Carton / Imprimerie</option>
                                          <option value="Études">Études et conseils</option>
                                          <option value="Services">Services aux entreprises</option>
                                       </select>
                            </div>
                        </div>
                        <div class="les-champs">
                            <div class="select">
                                <select name="format" id="format">
                                          <option selected disabled>Horaire</option>
                                          <option value="Homme">Matin</option>
                                          <option value="Femme">Après-midi</option>
                                       </select>
                            </div>
                        </div>
                    </div>
                    <!--===*** Type de formation ***===-->
                    <div class="groupe-champ-de-saisie">
                        <div class="les-champs ">
                            <div class="select type-de-formation">
                                <select name="format" id="format">
                                                  <option selected disabled>Type de cours</option>
                                                  <option value="presentiel">En présentiel</option>
                                                  <option value="ligne">En ligne</option>
                                               </select>
                            </div>
                        </div>
                    </div>
                    <!--===*** Les attentes ***===-->
                    <div class="les-champs">
                        <label><span class="etoile"></span></label>
                        <textarea type="text" name="attentes" placeholder="Vos attentes pour la formation" class="textarea" required autofocus></textarea>
                    </div>
                    <!--===*** Confirmation de l'enregistrer des champs ***===-->
                    <button type="submit" class="bouton bouton-block">S'enregistrer</button>
                </form>
            </div>
        </div>
        <!--===*** À droite ***===-->
        <div class="droite"></div>
    </div>
</body>

</html>