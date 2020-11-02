<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
               <i class="fe fe-film"></i> Ressources
            </h1>
        </div>
        <a href="<?= site_url('gestionnaire/nouvelle_ressource') ?>" class="btn btn-primary pull-right mb-5">Ajouter une ressource</a>
        <div class="card">
            <?php if (empty($ressources)) : ?>
                <div class="text-center display-5 p-5 col-12 mx-auto">
                    <p class="page-title">Aucune ressource créée pour le moment </p>
                    <p>Toutes les ressources s'afficheront ici.</p>
                </div>
            <?php else : ?>
                <div class="card-header">
                    <h3 class="card-title">Comptes gestionnaires</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Thématique</th>
                                <th>Lien</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ressources as $ressource) : ?>
                                <tr>
                                    <td><a href="" class="text-inherit"><?= $ressource->nom_res; ?></a></td>
                                    <td><?= 'Business Model' ?></td>
                                    <td><?= $ressource->lien ?></td>
                                    <td><?= 'Image' ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>

</div>