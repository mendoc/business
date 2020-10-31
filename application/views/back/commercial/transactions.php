<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Mes transactions
            </h1>
        </div>
        <div class="card">
            <?php if (empty($candidats)) : ?>
                <div class="text-center display-5 p-5 col-12 mx-auto">
                    <p class="page-title"> Aucune transaction pour le moment. </p>
                    <p>Ici sera affiché l'historique de vos gains et de vos retraits.</p>
                </div>
            <?php else : ?>
                <div class="card-header">
                    <h3 class="card-title">Historique de vos transactions</h3>
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
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($candidats as $candidat) : ?>
                                <tr>
                                    <td><a href="" class="text-inherit"><?= $candidat->nom_prenom; ?></a></td>
                                    <td><?= $candidat->horaire ?></td>
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
                                        <a class="icon" href="javascript:void(0)">
                                            <i class="fe fe-edit"></i>
                                        </a>
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