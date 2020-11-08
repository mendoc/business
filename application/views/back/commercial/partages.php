<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Mes partages
            </h1>
        </div>
        <div class="card">
            <?php if (empty($partages)) : ?>
                <div class="text-center display-5 p-5 col-12 mx-auto">
                    <p class="page-title"> Vous n'avez partagé aucune ressource jusqu'à présent. </p>
                    <p>Ici sera affiché la liste de toutes les ressources que vous aurez partagées.</p>
                </div>
            <?php else : ?>
                <div class="card-header">
                    <h3 class="card-title">Liste des ressources que vous avez partagées</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th>Nom de la ressource</th>
                                <th>Visites</th>
                                <th>Candidats</th>
                                <th>Affiliés</th>
                                <th>Gains</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($partages as $partage) : ?>
                                <tr>
                                    <td><?= $partage->nom_res; ?></td>
                                    <td><?= $partage->nbr_visite ?></td>
                                    <td>
                                        <?= 0 ?>
                                    </td>
                                    <td>
                                        <?= 0 ?>
                                    </td>
                                    <td>
                                        <?= 0 ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm action copier" data-lien="<?= site_url('partage/') . $partage->lien_gen ?>">
                                            <i class="fe fe-copy"></i> Copier le lien
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>

</div>