<main class="container">
    <!-- <div class="alert alert-success alert-dismissible fade show font-weight-bold mt-5" role="alert">
            <?= $this->session->flashdata('message-success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        </div>

        <div class="alert alert-danger alert-dismissible fade show font-weight-bold mt-5" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        </div> -->

    <div class="my-3 my-md-5">
        <div class="contenair d-flex">
            
        <div class="col-lg-6">
        <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Détails du gestionnaire</h3>
                </div>
                <div class="card-body">
                    <div class="block_details">
                        <h5 class="font-weight-normal text-body">Nom:</h5>

                    </div>

                    <div class="block_details">
                        <h5 class="font-weight-normal text-body">sexe:</h5>
                    </div>

                    <div class="block_details">
                        <h5 class="font-weight-normal text-body">Adresse e-mail:</h5>
                    </div>

                    <div class="block_details">
                        <h5 class="font-weight-normal text-body">Numéro de téléphone:</h5>
                    </div>    
                </div>
            </div>
        </div>

            <!-- <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Détails du gestionnaire</h3>
                </div>
                <div class="card-body">
                    <div class="block_details">
                        <h5 class="font-weight-normal text-body">Nom:</h5>

                    </div>

                    <div class="block_details">
                        <h5 class="font-weight-normal text-body">sexe:</h5>
                    </div>

                    <div class="block_details">
                        <h5 class="font-weight-normal text-body">Adresse e-mail:</h5>
                    </div>

                    <div class="block_details">
                        <h5 class="font-weight-normal text-body">Numéro de téléphone:</h5>
                    </div>    
                </div>
            </div> -->
            
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Droits d'accès</h3>
                    </div>
                    <div class="card-body ">
                        <form class="mb-4" action=" method=" POST">
                            
                            <div class="form-row">
                        
                        <!-- ============= checknox statistiques -->
                            <legend>Rubrique Statistiques</legend>
                                <div class="col-lg-6 mb-4">
                                    <div class="custom-controls-stacked">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="" value="" checked>
                                            <span class="custom-control-label">S1</span>
                                        </label>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="" value="">
                                            <span class="custom-control-label">S2</span>
                                        </label>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="" value="">
                                            <span class="custom-control-label">S3</span>
                                        </label>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="" value="">
                                            <span class="custom-control-label">S4</span>
                                        </label>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="" value="">
                                            <span class="custom-control-label">S5</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- =========== checkbox candidat ========= -->
                            <div class="form-row">
                            <legend>Rubrique Candidat</legend>
                            <div class="col-lg-6 mb-4">
                                    <div class="custom-controls-stacked">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="" value="" checked>
                                            <span class="custom-control-label">C1</span>
                                        </label>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="" value="">
                                            <span class="custom-control-label">C2</span>
                                        </label>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="" value="">
                                            <span class="custom-control-label">C3</span>
                                        </label>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="" value="">
                                            <span class="custom-control-label">C4</span>
                                        </label>
                                    </div>
                                </div>   
                            </div>
                            <!-- =============== Checkbox commercial ========== -->
                            <div class="form-row">
                            <legend>Rubrique Commercial</legend>
                            <div class="col-lg-6 mb-4">
                                    <div class="custom-controls-stacked">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="" value="" checked>
                                            <span class="custom-control-label">CO1</span>
                                        </label>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="" value="">
                                            <span class="custom-control-label">CO2</span>
                                        </label>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="" value="">
                                            <span class="custom-control-label">CO3</span>
                                        </label>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="" value="">
                                            <span class="custom-control-label">CO4</span>
                                        </label>
                                    </div>
                                </div>   
                            </div>

                            <!-- =============== Checkbox gestionnaire ========== -->
                            <div class="form-row">
                            <legend>Rubrique Gestionnaire</legend>
                            <div class="col-lg-6 mb-4">
                                    <div class="custom-controls-stacked">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="" value="" checked>
                                            <span class="custom-control-label">GE1</span>
                                        </label>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="" value="">
                                            <span class="custom-control-label">GE2</span>
                                        </label>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="" value="">
                                            <span class="custom-control-label">GE3</span>
                                        </label>
                                    </div>
                                </div>   
                            </div>

                             <!-- =============== Checkbox ressource ========== -->
                             <div class="form-row">
                            <legend>Rubrique Ressouce</legend>
                            <div class="col-lg-6 mb-4">
                                    <div class="custom-controls-stacked">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="" value="" checked>
                                            <span class="custom-control-label">R1</span>
                                        </label>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="" value="">
                                            <span class="custom-control-label">R2</span>
                                        </label>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="" value="">
                                            <span class="custom-control-label">R3</span>
                                        </label>
                                    </div>
                                </div>   
                            </div>

                             <!-- =============== Checkbox trésorerie ========== -->
                             <div class="form-row">
                            <legend>Rubrique Trésorerie</legend>
                            <div class="col-lg-6 mb-4">
                                    <div class="custom-controls-stacked">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="" value="" checked>
                                            <span class="custom-control-label">TR1</span>
                                        </label>
                                    </div>
                                </div>   
                            </div>

                             <!-- =============== Checkbox transaction candidat ========== -->
                             <div class="form-row">
                            <legend>Rubrique Transaction Candidat</legend>
                            <div class="col-lg-6 mb-4">
                                    <div class="custom-controls-stacked">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="" value="" checked>
                                            <span class="custom-control-label">TR1</span>
                                        </label>
                                    </div>
                                </div>   
                            </div>

                              <!-- =============== Checkbox transaction commercial ========== -->
                              <div class="form-row">
                            <legend>Rubrique Transaction Commercial</legend>
                            <div class="col-lg-6 mb-4">
                                    <div class="custom-controls-stacked">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="" value="" checked>
                                            <span class="custom-control-label">TCO1</span>
                                        </label>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="" value="">
                                            <span class="custom-control-label">TCO2</span>
                                        </label>
                                    </div>
                                </div>   
                            </div>

                             <!-- =============== Checkbox transaction sortie de caisse ========== -->
                             <div class="form-row">
                            <legend>Rubrique Transaction Commercial</legend>
                            <div class="col-lg-6 mb-4">
                                    <div class="custom-controls-stacked">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="" value="" checked>
                                            <span class="custom-control-label">TS1</span>
                                        </label>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="" value="">
                                            <span class="custom-control-label">TS2</span>
                                        </label>
                                    </div>
                                </div>   
                            </div>

                            <div class="card-footer text-right ">
                                <button type="submit" class="btn btn-primary col-lg-4">Sauvegarder</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

</main>

<!-- <script>

    const dateBirthElt = document.getElementById('date-of-birth');
    const dateSignIn = document.getElementById('date-sign-in');
    const dateElts = document.querySelectorAll('.date');
    function DateShortFormat(birth)
    {
        const date = new Date(birth);
        const options = {weekday: "long", year: "numeric", month: "long" , day: "numeric"};
        console.log(birth);
        return date.toLocaleDateString('fr', options);
    }

    dateBirthElt.textContent = DateShortFormat(dateBirthElt.getAttribute('data-date'));
    dateSignIn.textContent = DateShortFormat(dateSignIn.getAttribute('data-date'));
    dateElts.forEach(date => {
        date.textContent = DateShortFormat(date.getAttribute('data-create'));
    })
</script> -->