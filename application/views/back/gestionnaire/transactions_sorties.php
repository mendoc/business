<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                <i class="fa fa-money"></i> Sortie de caisse (retraits effectués)
            </h1>
        </div>
        <div class="card">
            <?php if (empty($retraits)) : ?>
                <div class="text-center display-5 p-5 col-12 mx-auto">
                    <p class="page-title"> Aucune transaction pour le moment. </p>
                    <p>Ici s'afficheront toutes les transactions financières de la plateforme.</p>
                </div>
            <?php else : ?>
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">Historique des sorties de caisse</h3>
                    <!-- <a href="<?= site_url('gestionnaire/export_transaction_commercial') ?>" class="btn btn-warning">Exporter en CSV</a> -->
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th>Nom du Tresorier</th>
                                <th>Montant du retrait</th>
                                <th>Motif</th>
                                <th>Date du retrait</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($retraits as $retrait) : ?>
                                <tr>
                                    <td><?= $retrait->gestionnaire ?></td>
                                    <td><?= number_format($retrait->montant, 0, ',', ' ') ?> F CFA</td>
                                    <td><?= $retrait->motif ?></td>
                                    <td><?= date_format(date_create($retrait->date_ret), 'D, d M y | G:i') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            <?php endif; ?>
        </div>
        <!-- <nav aria-label="Page navigation Candidat" class="d-flex justify-content-center"> 
            <?= $liens_de_pagination ?>
        </nav> -->
    </div>

</div>