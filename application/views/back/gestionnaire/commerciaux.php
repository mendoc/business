<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                <i class="fa fa-users"></i> Commerciaux
            </h1>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-center">Liste des commerciaux inscrits</h3>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                            <th>Noms d'utilisateurs</th>
                            <th>E-mail</th>
                            <th>Téléphone</th>
                            <th>Affiliés</th>
                            <th>Ressources partagées</th>
                            <th></th>
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
                                        <span>
                                            <?php echo $commercial->nom_prenom; ?>
                                        </span>
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
                                            <?= 'Aucun' ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span>
                                            <?= 'Aucune' ?>
                                        </span>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-light">Voir les détails</button>
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