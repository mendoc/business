<?= $navigations ?>
<main class="container">
    <?php if ($this->session->flashdata('message-success')) : ?>
        <div class="alert alert-success alert-dismissible fade show font-weight-bold mt-5" role="alert">
            <?= $this->session->flashdata('message-success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('message-error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show font-weight-bold mt-5" role="alert">
            <?= $this->session->flashdata('message-error') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="my-3 my-md-5">
        <div class="details_centre">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Détails du candidat</h3>
                </div>
                <div class="card-body">
                    <div class="block_details">
                        <h5 class="font-weight-normal text-body">Nom:</h5>
                        <p class="font-weight-bold"><?= $candidat->nom_prenom ?></p>
                    </div>

                    <div class="block_details">
                        <h5 class="font-weight-normal text-body">sexe:</h5>
                        <p class="font-weight-bold"><?= $candidat->sexe == 'H' ? 'Homme' : 'Femme' ?></p>
                    </div>

                    <div class="block_details">
                        <h5 class="font-weight-normal text-body">date de naissance:</h5>
                        <p class="font-weight-bold text-capitalize" id="date-of-birth" data-date="<?= $candidat->date_n ?>"></p>
                    </div>

                    <div class="block_details">
                        <h5 class="font-weight-normal text-body">Adresse e-mail:</h5>
                        <p class="font-weight-bold"><?= $candidat->email; ?></p>
                    </div>

                    <div class="block_details">
                        <h5 class="font-weight-normal text-body">Type de cours</h5>
                        <p class="font-weight-bold"><?= $candidat->type_cours == 'P' ? 'En presentiel' : 'En ligne' ?></p>
                    </div>

                    <div class="block_details">
                        <h5 class="font-weight-normal text-body">Numéro de téléphone:</h5>
                        <p class="font-weight-bold"><?= $candidat->num_tel; ?></p>
                    </div>

                    <div class="block_details">
                        <h5 class="font-weight-normal text-body">Numéro de téléphone whatsapp:</h5>
                        <p class="font-weight-bold"><?php echo empty($candidat->num_what) ? 'Aucun' : $candidat->num_what; ?></p>
                    </div>

                    <div class="block_details">
                        <h5 class="font-weight-normal text-body">Horaire de formation:</h5>
                        <p class="font-weight-bold"><?= $candidat->horaire; ?></p>
                    </div>

                    <div class="block_details">
                        <h5 class="font-weight-normal text-body">Domaine d'activité:</h5>
                        <p class="font-weight-bold"><?= $candidat->domaine_act; ?></p>
                    </div>

                    <div class="block_details">
                        <h5 class="font-weight-normal text-body">Type de service:</h5>
                        <p class="font-weight-bold"><?= $candidat->type_serv; ?></p>
                    </div>

                    <div class="block_details">
                        <h5 class="font-weight-normal text-body">Attentes:</h5>
                        <p class="font-weight-bold"><?= $candidat->attentes; ?></p>
                    </div>

                    <?php if(type_profil() != SUPERVISEUR) : ?>
                        <a href="<?= site_url('gestionnaire/modifier_candidat/' . $candidat->id_can) ?>" class="btn btn-primary rounded-0">
                            Modifier les informations <i class="fa fa-pencil-square" aria-hidden="true"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">

                <?php if (type_profil() != SUPERVISEUR && !$est_apprenant): ?>
                    <form class="mb-4" action="<?= site_url('gestionnaire/inscription_candidat/' . $candidat->id_can); ?>" method="POST">
                        <div class="form-row">
                            <div class="col-lg-6 mb-4">
                                <input type="number" name="montant" min="5000" class="form-control" placeholder="Montant" required>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="motif" class="form-control" placeholder="Motif">
                            </div>
                            <div class="col-lg-6 mb-4">
                                <select class="custom-select" name="moyen_paiement" required>
                                    <option value="presentiel" selected>En Cash</option>
                                    <option value="mobile_money">Mobile money</option>
                                    <option value="cheque">Cheque</option>
                                    <option value="virement">Virement Bancaire</option>
                                    <option value="carte_bancaire">Carte Bancaire</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="num_trans" class="form-control" placeholder="Numero de la Transaction">
                            </div>
                            <button type="submit" class="btn btn-primary col-lg-4">valider</button>
                        </div>
                    </form>
                <?php endif; ?>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Liste des paiements effectués</h3>
                    </div>

                    <div class="table-responsive">
                        <table class="table card-table table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th>Montant</th>
                                    <th>Motif</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($paiements)) { ?>
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            <span> Aucun paiement effectué </span>
                                        </td>
                                    </tr>
                                    <?php } else {
                                    foreach ($paiements as $paiement) : ?>
                                        <tr>
                                            <td><?= number_format($paiement->montant, 0, ',', ' '); ?> F CFA</td>
                                            <td><?= $paiement->motif ?></td>
                                            <td class="text-nowrap"><?= $paiement->date ?></td>
                                        </tr>
                                <?php endforeach;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

</main>

<script>
    const dateBirthElt = document.getElementById('date-of-birth');
    function DateShortFormat(birth)
    {
        const date = new Date(birth);
        const options = {weekday: "long", year: "numeric", month: "long" , day: "numeric"};
        console.log(birth);
        return date.toLocaleDateString('fr', options);
    }

    dateBirthElt.textContent = DateShortFormat(dateBirthElt.getAttribute('data-date'));
</script>