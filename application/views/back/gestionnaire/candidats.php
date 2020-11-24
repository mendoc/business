<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                <i class="fa fa-users"></i> Candidats
            </h1>
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">Liste des candidats inscrits (<?= isset($candidats) ? count($candidats) : 0 ?>) </h3>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                            <th>Noms & prénoms</th>
                            <th>Commercial</th>
                            <th>Statut</th>
                            <th>Payé</th>
                            <th>Reste a payer</th>
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
                                    <td><a href="<?= site_url('gestionnaire/detail_candidat/' . $candidat->id_can) ?>"><?= $candidat->nom_prenom; ?></a></td>
                                    <td><?= isset($candidat->nom_com) ? $candidat->nom_com : 'Aucun' ?></a></td>
                                    <td><?= $candidat->type_cours == 'P' ? 'En presentiel' : 'En ligne' ?></td>
                                    <td class="<?= $candidat->max_montant == $candidat->montant ? 'text-success font-weight-bold' : ($candidat->montant > 0 ? 'font-weight-bold text-warning' : '') ?>">
                                        <?=  number_format($candidat->montant, 0, ',', ' ');  ?> F CFA
                                    </td>
                                    <td class="<?= ($candidat->max_montant - $candidat->montant) > 0 ? 'text-danger font-weight-bold' : '' ?>">
                                        <?= number_format($candidat->max_montant - $candidat->montant, 0, ',', ' '); ?> F CFA
                                    </td>
                                </tr>
                        <?php endforeach;
                        } ?>

                    </tbody>
                </table>
            </div>
        </div>
        <nav aria-label="Page navigation Candidat" class="d-flex justify-content-around align-items-center"> 
            <?= $liens ?> <a href="<?= site_url('gestionnaire/export_candidat') ?>"  class="btn btn-primary">Exporter en CSV</a>
        </nav>
    </div>
</div>