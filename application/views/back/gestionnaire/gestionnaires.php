<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                <i class="fa fa-users"></i> Gestionnaires
            </h1>
        </div>
        <form class="mb-4" action="<?= site_url('gestionnaire/ajouter_gestionnaire'); ?>" method="POST">
            <div class="form-row">
                <div class="col">
                    <input type="text" name="nom" class="form-control" required placeholder="Nom et prénom du gestionnaire">
                </div>
                <div class="col">
                    <input type="email" name="email" class="form-control" required placeholder="Son adresse e-mail">
                </div>
                <div class="col-2">
                    <input type="submit" class="form-control text-white bg-primary" value="valider">
                </div>
            </div>
        </form>
        <div class="card">
            <?php if (empty($gestionnaires)) : ?>
                <div class="text-center display-5 p-5 col-12 mx-auto">
                    <p class="page-title">Aucun compte gestionnaire pour le moment </p>
                    <p>La liste de tous les comptes pouvant gérer la plateforme s'affiche ici</p>
                </div>
            <?php else : ?>
                <div class="card-header">
                    <h3 class="card-title">Comptes gestionnaires</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th>Noms & prénoms</th>
                                <th>Adresse e-mail</th>
                                <th>Paiements confirmés</th>
                                <th>Retraits gérés</th>
                                <th>Ressources créées</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($gestionnaires as $gestionnaire) : ?>
                                <tr>
                                    <td><a href="" class="text-inherit"><?= $gestionnaire->nom_prenom; ?></a></td>
                                    <td><?= $gestionnaire->email_gest ?></td>
                                    <td><?= 'Aucun' ?></td>
                                    <td><?= 'Aucun' ?></td>
                                    <td><?= 'Aucune' ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>

        <nav aria-label="Page navigation Candidat" class="d-flex justify-content-center"> 
            <?= $liens ?>
        </nav>
    </div>

</div>