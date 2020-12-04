<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                <i class="fa fa-money"></i> Transactions des commerciaux (retraits)
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
                    <h3 class="card-title">Historique des transactions</h3>
                    <a href="<?= site_url('gestionnaire/export_transaction_commercial') ?>" class="btn btn-warning">Exporter en CSV</a>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th>Nom du commercial</th>
                                <th>numero mobile money</th>
                                <th>Nom du gestionnaire</th>
                                <th>Date de confirmation</th>
                                <th>montant envoye</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($retraits as $retrait) : ?>
                                <tr>
                                    <td><?= $retrait->nom_com ?></td>
                                    <td><?= $retrait->num_ret ?></td>
                                    <td><?= $retrait->nom_gest ?></td>
                                    <td class="date text-capitalize" data-date="<?= $retrait->date_fin ?>"></td>
                                    <td><?= number_format($retrait->montant_retrait, 0, ',', ' ') ?> F CFA</td>
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
<script>
    const dateElts = document.querySelectorAll('.date');
    function DateShortFormat(birth)
    {
        const date = new Date(birth);
        const options = {weekday: "long", year: "numeric", month: "long" , day: "numeric"};
        console.log(birth);
        return date.toLocaleDateString('fr', options);
    }

    dateElts.forEach(date => {
        date.textContent = DateShortFormat(date.getAttribute('data-create'));
    })
</script>