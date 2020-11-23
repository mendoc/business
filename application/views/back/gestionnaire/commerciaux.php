<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                <i class="fa fa-users"></i> Commerciaux
            </h1>
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title text-center">Liste des commerciaux inscrits</h3>
                <a href="<?= site_url('gestionnaire/export_commercial') ?>" class="btn btn-warning">Exporter en CSV</a>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                            <th>Noms d'utilisateurs</th>
                            <th>E-mail</th>
                            <th>Téléphone</th>
                            <th>Affiliés</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($commerciaux)) { ?>
                            <tr>
                                <td colspan="4" class="text-center h1">
                                    <span>Aucun commercial inscrit</span>
                                </td>
                            </tr>
                            <?php } else {
                            foreach ($commerciaux as $commercial) : ?>
                                <tr>
                                    <td>
                                        <a href="<?= site_url('gestionnaire/detail_commercial/' . $commercial->id_com) ?>" class="btn btn-link">
                                            <?php echo $commercial->nom_prenom; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <span>
                                            <?php echo $commercial->email; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span>
                                            <?php echo $commercial->num_tel; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span>
                                            <?= $commercial->nb_affilies ?>
                                        </span>
                                    </td>
                                </tr>
                        <?php endforeach;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <nav aria-label="Page navigation Candidat" class="d-flex justify-content-center"> 
            <?= $liens_de_pagination ?>
        </nav>
    </div>

</div>