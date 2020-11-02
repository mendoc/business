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
                        <div class="text-right text-green">
                            0%
                            <i class="fe fe-chevron-up"></i>
                        </div>
                        <div class="h1 m-0">0</div>
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
                        <div class="h1 m-0">0</div>
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
                        <div class="h1 m-0">0</div>
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
                        <div class="h1 m-0">0</div>
                        <div class="text-muted mb-4">Chiffre d'affaire total
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
                        <div class="h1 m-0">0</div>
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
                        <div class="h1 m-0">0</div>
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
                                        <td><?= $retrait->numero ?></td>
                                        <td class="text-nowrap"><?= number_format($retrait->montant_retrait, 0, ',', ' '); ?> F CFA</td>
                                        <?php if ($email_utilisateur == $this->session->userdata('email')) { ?>
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
                            <tr>
                                <!-- <td class="w-1"><span class="avatar" style="background-image: url(./demo/faces/male/9.jpg)"></span></td> -->
                                <td>Ronald Bradley</td>
                                <td class="text-nowrap">25 000 F</td>
                                <td class="" colspan="2">
                                    Il y a 3 jours
                                </td>
                            </tr>

                            <tr>
                                <!-- <td><span class="avatar" style="background-image: url(./demo/faces/female/1.jpg)"></span></td> -->
                                <td>Beverly Armstrong</td>
                                <td class="text-nowrap">15 000 F</td>
                                <td class=""> Il y a 1 semaine</td>
                            </tr>
                            <tr>
                                <!-- <td><span class="avatar" style="background-image: url(./demo/faces/male/4.jpg)"></span></td> -->
                                <td>Bobby Knight</td>
                                <td class="text-nowrap">10 000 F</td>
                                <td class=""> 06 octobre 2020 </td>
                            </tr>
                            <tr>
                                <td>Sharon Wells</td>
                                <td class="text-nowrap">80 000 F</td>
                                <td class=""> Il y 20 min</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>