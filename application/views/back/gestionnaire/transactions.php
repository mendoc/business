<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                <i class="fa fa-money"></i> Transactions
            </h1>
        </div>
        <div class="card">
            <?php if (empty($paiements)) : ?>
                <div class="text-center display-5 p-5 col-12 mx-auto">
                    <p class="page-title"> Aucune transaction pour le moment. </p>
                    <p>Ici s'afficheront toutes les transactions financières de la plateforme.</p>
                </div>
            <?php else : ?>
                <div class="card-header">
                    <h3 class="card-title">Historique des transactions</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th>Nom du candidat</th>
                                <th>Type de cours</th>
                                <th>montant paye</th>
                                <th>montant restant</th>
                                <th>nom du gestionnaire</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($paiements as $paiement) : ?>
                                <tr>
                                    <td><?= $paiement->nom_candidat ?></td>
                                    <td><?= ($paiement->type == 'P') ? 'En presentiel' : 'En ligne' ?></td>
                                    <td><?= number_format($paiement->montant, 0, ',', ' ') ?> F CFA</td>
                                    <td><?= number_format($paiement->max_montant - $paiement->montant, 0,',',' ') ?> F CFA</td>
                                    <td><?= $paiement->gestionnaire ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>

        <nav aria-label="Page navigation Candidat" class="d-flex justify-content-center"> 
            <?= $liens_de_pagination ?>
        </nav>
    </div>

</div>