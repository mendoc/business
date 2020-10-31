<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                <i class="fa fa-users"></i> Candidats
            </h1>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Liste des candidats inscrits</h3>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                            <th>Noms & prénoms</th>
                            <th>Horaires</th>
                            <th>Téléphone</th>
                            <th>Domaine d'activité</th>
                            <th>Statut</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($candidats)) { ?>
                            <tr>
                                <td colspan="6" class="text-center h1">
                                    <span> Il n'y a pas encore de candidat </span>
                                </td>
                            </tr>
                            <?php } else {
                            foreach ($candidats as $candidat) : ?>
                                <tr>
                                    <td><span><?= $candidat->nom_prenom; ?></span></td>
                                    <td><a href="invoice.html" class="text-inherit"><?= $candidat->horaire ?></a></td>
                                    <td>
                                        <?= $candidat->num_tel ?>
                                    </td>
                                    <td>
                                        <?= $candidat->domaine_act ?>
                                    </td>
                                    <td>
                                        <?php if ($candidat->est_apprenant) { ?>
                                            <span class="status-icon bg-success"></span> Payé
                                        <?php } else {  ?>
                                            <span class="status-icon bg-danger"></span> Non payé
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a class="icon" href="<?= site_url('gestionnaire/detail_candidat/' . $candidat->id_can) ?>">
                                            <i class="fe fe-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                        <?php endforeach;
                        } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>