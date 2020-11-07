<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Mes transactions
            </h1>
        </div>
        <div class="card">
            <?php if (empty($retraits)) : ?>
                <div class="text-center display-5 p-5 col-12 mx-auto">
                    <p class="page-title"> Aucune transaction pour le moment. </p>
                    <p>Ici sera affiché l'historique de vos gains et de vos retraits.</p>
                </div>
            <?php else : ?>
                <div class="card-header">
                    <h3 class="card-title">Mes retraits</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th>Demandé le</th>
                                <th>Traité le</th>
                                <th>Montant</th>
                                <th>Numéro</th>
                                <th>Gestionnaire</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($retraits as $retrait) : ?>
                                <tr>
                                    <td>
                                       <?= date_format(date_create($retrait->date_ret), " d M à H:i"); ?>
                                    </td>
                                    <td>
                                       <?= date_format(date_create($retrait->date_fin), " d M à H:i"); ?>
                                    </td>
                                    <td>
                                        <?= number_format($retrait->montant_retrait, 0, '', ' '); ?> F CFA
                                    </td>
                                    <td>
                                       0<?= number_format($retrait->num_ret, 0, '', ' '); ?>
                                    </td>
                                    <td>
                                        <?= $retrait->nom_prenom                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
        <div class="card">
            <?php if (empty($gains)) : ?>
                <div class="text-center display-5 p-5 col-12 mx-auto">
                    <p class="page-title"> Aucun gain pour le moment. </p>
                    <p>Ici sera affiché l'historique de vos gains.</p>
                </div>
            <?php else : ?>
                <div class="card-header">
                    <h3 class="card-title">Mes gains</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Montant</th>
                                <th>Numéro</th>
                                <th>Gestionnaire</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($gains as $retrait) : ?>
                                <tr>
                                    <td>
                                        <?= date_format(date_create($retrait->date_ret), " d M à H:i"); ?>
                                    </td>
                                    <td>
                                        <?= $retrait->montant_retrait; ?>
                                    </td>
                                    <td>
                                        <?= $retrait->num_ret ?>
                                    </td>
                                    <td>
                                        <?= $retrait->id_gest                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ?>
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