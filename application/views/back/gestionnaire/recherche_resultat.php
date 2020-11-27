<div class="my-3 my-md-5">
    <div class="container h-auto">
        <div class="page-header">
            <h1 class="page-title border-bottom">
                Candidats Trouvés 
            </h1>
        </div>
        <div class="row row-cards">
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                            <th>Nom Complet</th>
                            <th>Commercial</th>
                            <th>Statut</th>
                            <th>Montant Payé</th>
                            <th>Montant restant</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($candidats)) { ?>
                            <tr>
                                <td colspan="5" class="text-center h1">
                                    <span> Aucun Candidat Trouvé </span>
                                </td>
                            </tr>
                            <?php } else {
                            foreach ($candidats as $candidat) : ?>
                                <tr>
                                    <td>
                                        <a href="<?= site_url('gestionnaire/detail_candidat/' . $candidat->id_can) ?>"><?= $candidat->nom_prenom; ?></a>
                                    </td>
                                    <td><?= isset($candidat->nom_com) ? $candidat->nom_com : 'Aucun' ?></a></td>
                                    <td><?= $candidat->type_cours == 'P' ? 'En presentiel' : 'En ligne' ?></td>
                                    <td class="<?= $candidat->max_montant == $candidat->montant ? 'text-success font-weight-bold' : '' ?>">
                                        <?=  number_format($candidat->montant, 0, ',', ' ');  ?> F CFA
                                    </td>
                                    <td class="<?= ($candidat->max_montant - $candidat->montant) > 0 ? 'text-danger font-weight-bold' : '' ?>">
                                        <?= number_format($candidat->max_montant - $candidat->montant, 0, ',', ' '); ?> F CFA
                                    </td>
                                </tr>
                        <?php endforeach;
                        } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="page-header">
            <h1 class="page-title border-bottom">
                Commerciaux Trouvés 
            </h1>
        </div>
        <div class="row row-cards">
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                            <th>Nom Complet</th>
                            <th>E-mail</th>
                            <th>Montant à Payer</th>
                            <th>Affiliés</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($commerciaux)) { ?>
                            <tr>
                                <td colspan="4" class="text-center h1">
                                    <span>Aucun commercial Trouvé</span>
                                </td>
                            </tr>
                            <?php } else {
                            foreach ($commerciaux as $commercial) : ?>
                                <tr>
                                    <td>
                                        <a href="<?= site_url('gestionnaire/detail_commercial/' . $commercial->id_com) ?>" >
                                            <?php echo $commercial->nom_prenom; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <span>
                                            <?php echo $commercial->email; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="<?= empty($commercial->solde) ? '' : 'text-danger font-weight-bold' ?>">
                                            <?= number_format($commercial->solde, 0, '', ' ') ?> F CFA
                                        </span>
                                    </td>
                                    <td>
                                        <span>
                                            <?= isset($commercial->nb_affilies) ? 0 : $commercial->nb_affilies ?>
                                        </span>
                                    </td>
                                </tr>
                        <?php endforeach;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>