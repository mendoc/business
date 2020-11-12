<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Tableau de bord
            </h1>
        </div>
        <div class="row row-cards">
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="h3 mb-2"><?= isset($visites_total) ? $visites_total: 0 ?></div>
                        <div class="text-muted mb-4">
                            Visites des commerciaux
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-right text-green">
                            0%
                            <i class="fe fe-chevron-up"></i>
                        </div>
                        <div class="h3 m-0"><?= isset($nb_candidats) ? $nb_candidats : 0 ?></div>
                        <div class="text-muted mb-4">Candidats
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-right text-red">
                            0%
                            <i class="fe fe-chevron-down"></i>
                        </div>
                        <div class="h3 m-0"><?= isset($nb_apprenants) ? $nb_apprenants : 0 ?></div>
                        <div class="text-muted mb-4">Apprenants
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-right text-green">
                            0%
                            <i class="fe fe-chevron-up"></i>
                        </div>
                        <div class="h3 m-0"><?= isset($nombre_commerciaux) ? $nombre_commerciaux : 0 ?></div>
                        <div class="text-muted mb-4">Commerciaux
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-right text-green">
                            F CFA
                        </div>
                        <div class="h3 m-0"><?= isset($chiffre_affaire) ? number_format($chiffre_affaire, 0, '', ' ') : 0 ?></div>
                        <div class="text-muted mb-4">Chiffre d'affaire
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-right text-red">
                            F CFA
                        </div>
                        <div class="h3 m-0"><?= isset($total_retrait) ? number_format($total_retrait, 0, '', ' ') : 0 ?></div>
                        <div class="text-muted mb-4">Total des retraits
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-right text-red">
                            F CFA
                        </div>
                        <div class="h3 m-0"><?= (isset($chiffre_affaire) ? number_format((int)($chiffre_affaire) - (int)($total_retrait), 0, '', ' ') : 0) ?></div>
                        <div class="text-muted mb-4">Solde
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="page-title mb-5">
            Retraits et paiements
        </h2>
        <div class="col-lg-12 row">
            <div class="card col-6">
                <div class="card-header">
                    <h3 class="card-title">Dernières demandes de retraits</h3>
                </div>

                <div class="table-responsive">
                    <table class="table card-table table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Numéro</th>
                                <th>Montant</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($retraits)) { ?>
                                <tr>
                                    <td colspan="4" class="text-center h1">
                                        <span> Il n'y a pas encore de retrait demande </span>
                                    </td>
                                </tr>
                                <?php } else {
                                foreach ($retraits as $retrait) : ?>
                                    <tr>
                                        <td><?= $retrait->property ?></td>
                                        <td><?= $retrait->num_ret ?></td>
                                        <td class="text-nowrap"><?= number_format($retrait->montant_retrait, 0, ',', ' '); ?> F CFA</td>
                                        <?php if ($email_utilisateur == $this->session->userdata('email_gest') && !empty($retrait->id_gest)) { ?>
                                            <td class="w-1"> <a href="<?= site_url('gestionnaire/finaliser_un_retrait/' . $retrait->id_ret) ?>" class="btn btn-sm btn-success text-white"> je confirme </a></td>
                                        <?php } else { ?>
                                            <?php if ($retrait->id_gest) { ?>
                                                <td> en cours </td>
                                            <?php } else { ?>
                                                <td class="w-1"> <a href="<?= site_url('gestionnaire/prendre_un_retrait/' . $retrait->id_ret) ?>" class="btn btn-sm btn-primary text-white"> je prends</a></td>
                                            <?php } ?>
                                        <?php } ?>
                                    </tr>
                            <?php endforeach;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card col-5 ml-5">
                <div class="card-header">
                    <h3 class="card-title">Derniers paiements des candidats</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Montant</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (empty($paiements)) { ?>
                                <tr>
                                    <td colspan="3" class="text-center h1">
                                        <span> Il n'y a pas encore de retrait demande </span>
                                    </td>
                                </tr>
                                <?php } else {
                                foreach ($paiements as $paiement) : ?>
                                    <tr>
                                        <td><?= $paiement->nom_candidat ?></td>
                                        <td class="text-nowrap"><?= number_format($paiement->montant, 0, '', ' ') ?> F CFA</td>
                                        <td class="" colspan="2">
                                            <?php 
                                                $date = date_diff(date_create($paiement->date), date_create())->format('%d');
                                                echo $date == '0' ? "Aujourd'hui" : "Il y a ". $date . " jour(s)"
                                            ?>
                                        </td>
                                    </tr>
                            <?php endforeach;
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card col-6">
                <div class="card-header">
                    <h3 class="card-title">Trafic des commerciaux</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th>Nom Complet</th>
                                <th>visite</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (empty($commerciaux)) { ?>
                                <tr>
                                    <td colspan="2" class="text-center h1">
                                        <span> Rien a Signaler </span>
                                    </td>
                                </tr>
                                <?php } else {
                                foreach ($commerciaux as $commercial) : ?>
                                    <tr>
                                        <td class="text-nowrap"><?= $commercial->nom_prenom ?></td>
                                        <td><?= $commercial->nbr_visite ?></td>
                                    </tr>
                            <?php endforeach;
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card col-5 ml-5">
                <div class="card-header">
                    <h3 class="card-title">Performance des commerciaux </h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th>Nom Complet</th>
                                <th>Nb. Candidat</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (empty($best_commerciaux)) { ?>
                                <tr>
                                    <td colspan="2" class="text-center h1">
                                        <span> Aucune Performance </span>
                                    </td>
                                </tr>
                                <?php } else {
                                foreach ($best_commerciaux as $commercial) : ?>
                                    <tr>
                                        <td class="text-nowrap"><?= $commercial->nom_prenom ?></td>
                                        <td class="text-right"><?= $commercial->nb_candidat ?></td>
                                    </tr>
                            <?php endforeach;
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card col-6">
                <div class="card-header">
                    <h3 class="card-title">Nombre d'inscrit par jour </h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (empty($inscrits_jour)) { ?>
                                <tr>
                                    <td colspan="2" class="text-center h1">
                                        <span> RAS </span>
                                    </td>
                                </tr>
                                <?php } else {
                                foreach ($inscrits_jour as $inscrit) : ?>
                                    <tr>
                                        <td class="text-nowrap"><?= $inscrit->jour ?></td>
                                        <td class=""><?= $inscrit->nombre_inscrits ?></td>
                                    </tr>
                            <?php endforeach;
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>

            
        </div>
    </div>
</div>