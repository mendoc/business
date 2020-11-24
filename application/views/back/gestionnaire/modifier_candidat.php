<div class="mt-5 mb-5 w-50 mx-auto bg-white p-5">
    <form action="<?= site_url('gestionnaire/traitement_modification_candidat/' . $candidat->id_can) ?>" method="POST">
        <div class="form-row mb-5">
            <div class="col">
                <input type="text" name="nom_prenom" placeholder="<?= $candidat->nom_prenom ?>" class="form-control" />
            </div>
            <div class="col">
                <input type="email" name="email" placeholder="<?= $candidat->email ?>" class="form-control" aria-describedby="emailHelp" />
                <?php if ($this->session->flashdata('email-error')): ?>
                    <small id="emailHelp" class="form-text text-danger">
                        <?= $this->session->flashdata('email-error') ?>
                    </small>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-row mb-5">
            <div class="col">
                <select name="sexe" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                    <option disabled>Sexe</option>
                    <option value="F" <?= $candidat->sexe == 'F' ? 'selected' : '' ?>>Femme</option>
                    <option value="H" <?= $candidat->sexe == 'H' ? 'selected' : '' ?>>Homme</option>
                </select>
            </div>
            <div class="col">
                <select name="horaire" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                    <option disabled>Choississez une horaire</option>
                    <option <?= $candidat->horaire == 'Matin' ? 'selected' : '' ?>>Matin</option>
                    <option <?= $candidat->horaire == 'Après-midi' ? 'selected' : '' ?>>Après-midi</option>
                </select>
            </div>
        </div>

        <div class="form-row mb-5">
            <div class="col">
                <select name="type_cours" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                    <option disabled>Type de cours</option>
                    <option value="P" <?= $candidat->type_cours == 'P' ? 'selected' : '' ?>>En présentiel - 155.000fcfa</option>
                    <option value="L" <?= $candidat->type_cours == 'L' ? 'selected' : '' ?>>En ligne - 90.000fcfa</option>
                </select>
            </div>
            <div class="col">
                <select name="domaine_act" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                    <option disabled>Domaine d'activite</option>
                    <option <?= $candidat->domaine_act == 'Agroalimentaire' ? 'selected' : '' ?> value="Agroalimentaire">Agroalimentaire</option>
                    <option <?= $candidat->domaine_act == 'Communication' ? 'selected' : '' ?> value="Communication">Communication</option>
                    <option <?= $candidat->domaine_act == 'Informatique' ? 'selected' : '' ?> value="Informatique">Informatique</option>
                    <option <?= $candidat->domaine_act == 'Transaport' ? 'selected' : '' ?> value="Transaport">Transaport</option>
                    <option <?= $candidat->domaine_act == 'Textile' ? 'selected' : '' ?> value="Textile">Textile</option>
                    <option <?= $candidat->domaine_act == 'Automobile' ? 'selected' : '' ?> value="Automobile">Automobile</option>
                    <option <?= $candidat->domaine_act == 'Industrie' ? 'selected' : '' ?> value="Industrie-pharmaceutique"> Industrie pharmaceutique</option>
                    <option <?= $candidat->domaine_act == 'Électronique' ? 'selected' : '' ?> value="Électronique">Électronique</option>
                    <option <?= $candidat->domaine_act == 'Commerce' ? 'selected' : '' ?> value="Commerce">Commerce / Négoce / Distribution</option>
                    <option <?= $candidat->domaine_act == 'BTP' ? 'selected' : '' ?> value="BTP"> BTP / Matériaux de construction</option>
                    <option <?= $candidat->domaine_act == 'Santé' ? 'selected' : '' ?> value="Santé"> Santé</option>
                    <option <?= $candidat->domaine_act == 'Banque' ? 'selected' : '' ?> value="Banque">Banque / Assurance</option>
                    <option <?= $candidat->domaine_act == 'Bois' ? 'selected' : '' ?> value="Bois"> Bois / Papier / Carton / Imprimerie</option>
                    <option <?= $candidat->domaine_act == 'Études' ? 'selected' : '' ?> value="Études">Études et conseils</option>
                    <option <?= $candidat->domaine_act == 'Services' ? 'selected' : '' ?> value="Services">Services aux entreprises</option>
                    <option <?= $candidat->domaine_act == 'Gaming' ? 'selected' : '' ?> value="Gaming">Industrie créative / Jeux vidéo</option>
                    <option <?= $candidat->domaine_act == 'Photographie' ? 'selected' : '' ?> value="Photographie">Portrait photographie et paysage</option>
                    <option <?= $candidat->domaine_act == 'Halieutique' ? 'selected' : '' ?> value="Halieutique">Pêche</option>
                    <option <?= $candidat->domaine_act == 'Education' ? 'selected' : '' ?> value="Education">Education</option>
                    <option <?= $candidat->domaine_act == 'Agriculture' ? 'selected' : '' ?> value="Agriculture">Agricole</option>
                    <option <?= $candidat->domaine_act == 'Artisanat' ? 'selected' : '' ?> value="Artisanat">Artisanat</option>
                    <option <?= $candidat->domaine_act == 'Maroquerie' ? 'selected' : '' ?> value="Maroquerie">Maroquerie</option>
                    <option <?= $candidat->domaine_act == 'Finance' ? 'selected' : '' ?> value="Finance">Micro finance</option>
                    <option <?= $candidat->domaine_act == 'Autre' ? 'selected' : '' ?> value="Autre">Autres</option>
                </select>
            </div>
        </div>

        <div class="form-row mb-5">
            <div class="col">
                <input type="tel" name="num_tel" class="form-control" placeholder="<?= empty($candidat->num_tel) ? 'Telephone' : $candidat->num_tel ?>" />
            </div>
            <div class="col">
                <input type="tel" name="num_what" class="form-control" placeholder="<?= empty($candidat->num_what) ? 'Whatsapp' : $candidat->num_what ?>" />
            </div>
        </div>


        <div class="form-row mb-5">
            <textarea class="form-control" name="attentes" id="exampleFormControlTextarea1" placeholder="<?= empty($candidat->attentes) ? 'Quelles sont vos attentes par rapport a la formation ?' : $candidat->attentes ?>" rows="5"></textarea>
        </div>

        <h6 class="font-weight-normal text-dark">Date de naissance</h6>
        <div class="form-row mb-5">
            <div class="col">
                <select name="jour" class="custom-select my-1 mr-sm-2">
                    <option disabled>Jour</option>
                    <option <?= $jour == '01' ? 'selected' : '' ?>>01</option>
                    <option <?= $jour == '02' ? 'selected' : '' ?>>02</option>
                    <option <?= $jour == '03' ? 'selected' : '' ?>>03</option>
                    <option <?= $jour == '04' ? 'selected' : '' ?>>04</option>
                    <option <?= $jour == '05' ? 'selected' : '' ?>>05</option>
                    <option <?= $jour == '06' ? 'selected' : '' ?>>06</option>
                    <option <?= $jour == '07' ? 'selected' : '' ?>>07</option>
                    <option <?= $jour == '08' ? 'selected' : '' ?>>08</option>
                    <option <?= $jour == '09' ? 'selected' : '' ?>>09</option>
                    <option <?= $jour == '10' ? 'selected' : '' ?>>10</option>
                    <option <?= $jour == '11' ? 'selected' : '' ?>>11</option>
                    <option <?= $jour == '12' ? 'selected' : '' ?>>12</option>
                    <option <?= $jour == '13' ? 'selected' : '' ?>>13</option>
                    <option <?= $jour == '14' ? 'selected' : '' ?>>14</option>
                    <option <?= $jour == '15' ? 'selected' : '' ?>>15</option>
                    <option <?= $jour == '16' ? 'selected' : '' ?>>16</option>
                    <option <?= $jour == '17' ? 'selected' : '' ?>>17</option>
                    <option <?= $jour == '18' ? 'selected' : '' ?>>18</option>
                    <option <?= $jour == '19' ? 'selected' : '' ?>>19</option>
                    <option <?= $jour == '20' ? 'selected' : '' ?>>20</option>
                    <option <?= $jour == '21' ? 'selected' : '' ?>>21</option>
                    <option <?= $jour == '22' ? 'selected' : '' ?>>22</option>
                    <option <?= $jour == '23' ? 'selected' : '' ?>>23</option>
                    <option <?= $jour == '24' ? 'selected' : '' ?>>24</option>
                    <option <?= $jour == '25' ? 'selected' : '' ?>>25</option>
                    <option <?= $jour == '26' ? 'selected' : '' ?>>26</option>
                    <option <?= $jour == '27' ? 'selected' : '' ?>>27</option>
                    <option <?= $jour == '28' ? 'selected' : '' ?>>28</option>
                    <option <?= $jour == '29' ? 'selected' : '' ?>>29</option>
                    <option <?= $jour == '30' ? 'selected' : '' ?>>30</option>
                    <option <?= $jour == '31' ? 'selected' : '' ?>>31</option>
                </select>
            </div>
            <div class="col">
                <select name="mois" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                    <option disabled>Mois</option>
                    <option <?= $mois == '01' ? 'selected' : '' ?> value="01">Janvier</option>
                    <option <?= $mois == '02' ? 'selected' : '' ?> value="02">Février</option>
                    <option <?= $mois == '03' ? 'selected' : '' ?> value="03">Mars</option>
                    <option <?= $mois == '04' ? 'selected' : '' ?> value="04">Avril</option>
                    <option <?= $mois == '05' ? 'selected' : '' ?> value="05">Mai</option>
                    <option <?= $mois == '06' ? 'selected' : '' ?> value="06">Juin</option>
                    <option <?= $mois == '07' ? 'selected' : '' ?> value="07">Juillet</option>
                    <option <?= $mois == '08' ? 'selected' : '' ?> value="08">Août</option>
                    <option <?= $mois == '09' ? 'selected' : '' ?> value="09">Septembre</option>
                    <option <?= $mois == '10' ? 'selected' : '' ?> value="10">Octobre</option>
                    <option <?= $mois == '11' ? 'selected' : '' ?> value="11">Novembre</option>
                    <option <?= $mois == '12' ? 'selected' : '' ?> value="12">Décembre</option>
                </select>
            </div>
            <div class="col">
                <select name="annee" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                    <option disabled>Année</option>
                    <option <?= $annee == '1960' ? 'selected' : '' ?> >1960</option>
                    <option <?= $annee == '1961' ? 'selected' : '' ?> >1961</option>
                    <option <?= $annee == '1962' ? 'selected' : '' ?> >1962</option>
                    <option <?= $annee == '1963' ? 'selected' : '' ?> >1963</option>
                    <option <?= $annee == '1964' ? 'selected' : '' ?> >1964</option>
                    <option <?= $annee == '1965' ? 'selected' : '' ?> >1965</option>
                    <option <?= $annee == '1966' ? 'selected' : '' ?> >1966</option>
                    <option <?= $annee == '1967' ? 'selected' : '' ?> >1967</option>
                    <option <?= $annee == '1968' ? 'selected' : '' ?> >1968</option>
                    <option <?= $annee == '1969' ? 'selected' : '' ?> >1969</option>
                    <option <?= $annee == '1970' ? 'selected' : '' ?> >1970</option>
                    <option <?= $annee == '1971' ? 'selected' : '' ?> >1971</option>
                    <option <?= $annee == '1972' ? 'selected' : '' ?> >1972</option>
                    <option <?= $annee == '1973' ? 'selected' : '' ?> >1973</option>
                    <option <?= $annee == '1974' ? 'selected' : '' ?> >1974</option>
                    <option <?= $annee == '1975' ? 'selected' : '' ?> >1975</option>
                    <option <?= $annee == '1976' ? 'selected' : '' ?> >1976</option>
                    <option <?= $annee == '1977' ? 'selected' : '' ?> >1977</option>
                    <option <?= $annee == '1978' ? 'selected' : '' ?> >1978</option>
                    <option <?= $annee == '1979' ? 'selected' : '' ?> >1979</option>
                    <option <?= $annee == '1980' ? 'selected' : '' ?> >1980</option>
                    <option <?= $annee == '1981' ? 'selected' : '' ?> >1981</option>
                    <option <?= $annee == '1982' ? 'selected' : '' ?> >1982</option>
                    <option <?= $annee == '1983' ? 'selected' : '' ?> >1983</option>
                    <option <?= $annee == '1984' ? 'selected' : '' ?> >1984</option>
                    <option <?= $annee == '1985' ? 'selected' : '' ?> >1985</option>
                    <option <?= $annee == '1986' ? 'selected' : '' ?> >1986</option>
                    <option <?= $annee == '1987' ? 'selected' : '' ?> >1987</option>
                    <option <?= $annee == '1988' ? 'selected' : '' ?> >1988</option>
                    <option <?= $annee == '1989' ? 'selected' : '' ?> >1989</option>
                    <option <?= $annee == '1990' ? 'selected' : '' ?> >1990</option>
                    <option <?= $annee == '1991' ? 'selected' : '' ?> >1991</option>
                    <option <?= $annee == '1992' ? 'selected' : '' ?> >1992</option>
                    <option <?= $annee == '1993' ? 'selected' : '' ?> >1993</option>
                    <option <?= $annee == '1994' ? 'selected' : '' ?> >1994</option>
                    <option <?= $annee == '1995' ? 'selected' : '' ?> >1995</option>
                    <option <?= $annee == '1996' ? 'selected' : '' ?> >1996</option>
                    <option <?= $annee == '1997' ? 'selected' : '' ?> >1997</option>
                    <option <?= $annee == '1998' ? 'selected' : '' ?> >1998</option>
                    <option <?= $annee == '1999' ? 'selected' : '' ?> >1999</option>
                    <option <?= $annee == '2000' ? 'selected' : '' ?> >2000</option>
                    <option <?= $annee == '2001' ? 'selected' : '' ?> >2001</option>
                    <option <?= $annee == '2002' ? 'selected' : '' ?> >2002</option>
                    <option <?= $annee == '2003' ? 'selected' : '' ?> >2003</option>
                    <option <?= $annee == '2004' ? 'selected' : '' ?> >2004</option>
                    <option <?= $annee == '2005' ? 'selected' : '' ?> >2005</option>
                    <option <?= $annee == '2006' ? 'selected' : '' ?> >2006</option>
                    <option <?= $annee == '2007' ? 'selected' : '' ?> >2007</option>
                    <option <?= $annee == '2008' ? 'selected' : '' ?> >2008</option>
                    <option <?= $annee == '2009' ? 'selected' : '' ?> >2009</option>
                    <option <?= $annee == '2010' ? 'selected' : '' ?> >2010</option>
                    <option <?= $annee == '2011' ? 'selected' : '' ?> >2011</option>
                    <option <?= $annee == '2012' ? 'selected' : '' ?> >2012</option>
                    <option <?= $annee == '2013' ? 'selected' : '' ?> >2013</option>
                    <option <?= $annee == '2014' ? 'selected' : '' ?> >2014</option>
                    <option <?= $annee == '2015' ? 'selected' : '' ?> >2015</option>
                    <option <?= $annee == '2016' ? 'selected' : '' ?> >2016</option>
                    <option <?= $annee == '2017' ? 'selected' : '' ?> >2017</option>
                    <option <?= $annee == '2018' ? 'selected' : '' ?> >2018</option>
                    <option <?= $annee == '2019' ? 'selected' : '' ?> >2019</option>
                    <option <?= $annee == '2020' ? 'selected' : '' ?> >2020</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary rounded-0">Modifier </button>
    </form>
</div>