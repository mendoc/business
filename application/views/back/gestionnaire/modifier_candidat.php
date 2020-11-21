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
                    <option selected disabled>Domaine d'activite</option>
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
            </div>
            <div class="col">
                <select name="mois" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                    <option selected disabled>Mois</option>
                    <option value="01">Janvier</option>
                    <option value="02">Février</option>
                    <option value="03">Mars</option>
                    <option value="04">Avril</option>
                    <option value="05">Mai</option>
                    <option value="06">Juin</option>
                    <option value="07">Juillet</option>
                    <option value="08">Août</option>
                    <option value="09">Septembre</option>
                    <option value="10">Octobre</option>
                    <option value="11">Novembre</option>
                    <option value="12">Décembre</option>
                </select>
            </div>
            <div class="col">
                <select name="annee" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                    <option selected disabled>Année</option>
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
                    <option>1990</option>
                    <option>1991</option>
                    <option>1992</option>
                    <option>1993</option>
                    <option>1994</option>
                    <option>1995</option>
                    <option>1996</option>
                    <option>1997</option>
                    <option>1998</option>
                    <option>1999</option>
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

        <button type="submit" class="btn btn-primary rounded-0">Modifier </button>
    </form>
</div>