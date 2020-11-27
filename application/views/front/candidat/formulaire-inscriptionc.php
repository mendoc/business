<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Formulaire Inscription C Candidat
    </title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= theme_url() ?>assets/css/formulaire-inscriptionc.css">
</head>

<body>

    <header>
        <div class="logo">
            <h1 titre-logo>Ecole 241<span>Business</span></h1>
        </div>
    </header>
    <form id="regForm" action="" class="container">
        <div class="form-img">
            <img src="https://business.ecole241.org/theme/assets/images/Ebusiness-logo.png" alt="">
        </div>
        <legend class="heading-1">Inscription candidat</legend>
        <!-- One "tab" for each step in the form: -->
        <section class="tab">


            <div class="d-lg-flex flex-column align-items-center justify-content-between">
                <div class="col-lg-6 col-sm-12 form-group">
                    <label for="exampleInputEmail1">Nom Complet <span class="obliger">*</span> </label>
                    <input type="text" class="form-control" placeholder="Ex: MOUKEYTOU Regis" required>
                    <!-- <small id="emailHelp" class="form-text text-danger">
                        Cet email existe deja
                    </small> -->
                </div>
                <div class="col-lg-6 col-sm-12 form-group">
                    <label for="exampleInputEmail1">Addresse mail <span class="obliger">*</span></label>
                    <input type="text" class="form-control" placeholder="Ex: moukeytouregis@gmail.com" required>
                </div>
            </div>

            <div class="d-lg-flex flex-column align-items-center justify-content-center">
                <div class="col-lg-6 col-sm-12 form-group">
                    <label for="">Genre <span class="obliger">*</span></label>
                    <select class="custom-select" required>
                        <option disabled >Choississez votre sexe</option>
                        <option value="H" selected>Homme</option>
                        <option value="F">Femme</option>
                    </select>
                </div>
                <div class="col-lg-6 col-sm-12 form-group">
                    <label for="exampleInputEmail1">Numero de Telephone <span class="obliger">*</span></label>
                    <input type="tel" class="form-control" placeholder="Ex: +24100 00 00" required />
                </div>
            </div>


        </section>


        <section class="tab dimension">
            <div class="form-group espace">
                <label for="">Votre domaine d'activite <span class="obliger">*</span></label>
                <select class="custom-select">
                    <!-- <option disabled selected>Choississez votre sexe</option>
                        <option selected disabled>Votre activité</option> -->
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
                    <option value="Autre" selected>Autres</option>
                </select>
            </div>

            <div class="form-group espace">
                <label for="">Preferez vous apprendre en ligne ou en presentiel <span class="obliger">*</span></label>
                <select name="type_cours" required class="custom-select" id="cours">
                    <option value="P">En presentiel</option>
                    <option value="L">En ligne</option>
                </select>
            </div>

            <div class="form-group espace">
                <label for="">Modalite de paiement <span class="obliger">*</span></label>
                <select name="type_cours" required class="custom-select" id="modalite">
                    <option value="1">1 Tranche</option>
                    <option value="2">2 Tranches</option>
                    <option value="3">3 Tranches</option>
                </select>
            </div>
        </section>


        <div class="dimension" style="overflow:auto;">
            <div style="float:right; margin-right: 5px;">
                <button type="button" id="prevBtn" class="bg-dark text-white" onclick="nextPrev(-1)">Precedent</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Suivant</button>
            </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
        </div>
    </form>

    <footer>
        <div class="footer-contenair">
            <p>&copy Copyright Ecole241Business</p>
            <a href="https://ecole241.org" class="footerBadge footerBadge--production">Réalisé par <span>Ecole 241</span></a>
        </div>
    </footer>

    <script>
        const typeCoursElt = document.getElementById('cours');
        const modaliteElt = document.getElementById('modalite');
        typeCoursElt.onchange = e => {
            if (e.target.value == 'L') {
                modaliteElt.setAttribute('disabled', true);
                modaliteElt.value = "1"
            } else {
                modaliteElt.removeAttribute('disabled');
            }
        }
        var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "S'inscrire";
  } else {
    document.getElementById("nextBtn").innerHTML = "Suivant";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

        function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false
            valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
        }

        function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="./index.js"></script>

</body>

</html>