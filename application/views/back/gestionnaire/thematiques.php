<div class="mt-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                <i class="fa fa-pin"></i> Thématiques
            </h1>
        </div>
        <form action="<?= site_url('gestionnaire/traitement_nouvelle_thematique') ?>" method="post">
            <div class="card-body">
                <div class="row offset-3">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="form-label">Nouvelle thématique</label>
                            <input type="text" name="titre" class="form-control" placeholder="Renseignez le nom de la thématique">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label class="form-label">&nbsp;</label>
                            <input type="submit" class="form-control text-white bg-primary" value="Créer la thématique">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="card">
            <?php if (empty($thematiques)) : ?>
                <div class="text-center display-5 p-5 col-12 mx-auto">
                    <p class="page-title">Aucune thématique créée pour le moment</p>
                    <p>La liste de toutes les thématiques s'affichera ici</p>
                </div>
            <?php else : ?>

                <div class="card-header">
                    <h3 class="card-title">Liste des thématiques</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Nombre de ressources</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($thematiques as $thematique) : ?>
                                <tr>
                                    <td><a href="" class="text-inherit"><?= $thematique->titre; ?></a></td>
                                    <td><?= 0 ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>

</div>