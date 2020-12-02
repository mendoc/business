<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                <i class="fa fa-users"></i> Mes prospects
            </h1>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Liste de mes prospects inscrits (<?= isset($candidats) ? count($candidats) : 0 ?>) </h3>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                            <th>Noms Complet</th>
                            <th>Numero de telephone</th>
                            <th>Statut</th>
                            <th>Domaine d'activite</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($candidats)) { ?>
                            <tr>
                                <td colspan="4" class="text-center h1">
                                    <span> Vous n'avez encore inscrit personne </span>
                                </td>
                            </tr>
                            <?php } else {
                            foreach ($candidats as $candidat) : ?>
                                <tr>
                                    <td><?= $candidat->nom_prenom ?></td>
                                    <td><?= $candidat->num_tel ?></td>
                                    <td><?= $candidat->type_cours == 'P' ? 'En presentiel' : 'En ligne' ?></td>
                                    <td><?= $candidat->domaine_act ?></td>
                                </tr>
                        <?php endforeach;
                        } ?>

                    </tbody>
                </table>
                <?php
                if (!empty($candidat)) { ?>
                    <nav aria-label="Page navigation Candidat" class="d-flex justify-content-around align-items-center">
                        <?= $liens ?>
                    </nav>

                <?php }

                ?>
            </div>
        </div>
    </div>
</div>