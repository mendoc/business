<div class="my-3 my-md-5">
    <div class="container">
        <?php if ($this->session->flashdata('message-error')) : ?>
            <div class="alert alert-danger alert-dismissible fade show font-weight-bold" role="alert">
                <?= $this->session->flashdata('message-error') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('message-success')) : ?>
            <div class="alert alert-success alert-dismissible fade show font-weight-bold" role="alert">
                <?= $this->session->flashdata('message-success') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

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
                            Nombre
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
                        <div class="text-right text-green">
                            Nombre
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
                            Nombre
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
                        <div class="text-right text-green">
                            F CFA
                        </div>
                        <div class="h3 m-0"><?= isset($total_transaction_commerciaux) ? number_format($total_transaction_commerciaux, 0, '.', ' ') : 0 ?></div>
                        <div class="text-muted mb-1">Total Paiements Commerciaux
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

        <h2 class="page-title mb-5 text-danger">
            Dettes
        </h2>

        <?php if (type_profil() == TRESORIER): ?>
            <button type="button" class="btn btn-danger text-uppercase mb-5" data-toggle="modal" data-target="#retraitModal">
                Effectuer un retrait
            </button>

            <div class="modal fade" id="retraitModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form class="modal-content" method="POST" action="<?= site_url('gestionnaire/sortie_caisse') ?>">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Formulaire de sortie de caisse
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- <form> -->
                            <div class="form-group">
                                <label for="montant" class="col-form-label">Saisissez le montant a retirer </label>
                                <input type="number" name="montant" min="1000"  class="form-control" id="montant" required>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Quel est votre motif ?</label>
                                <textarea class="form-control" name="motif" id="message-text" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="mot_de_passe" class="col-form-label">Confirmer ce retrait avec votre mot de passe </label>
                                <input type="password" required name="mot_de_passe" class="form-control" id="mot_de_passe">
                            </div>
                            <!-- </form> -->
                        </div>
                        <div class="modal-footer">
                            <input type="reset" value="Annuler" class="btn btn-secondary" />
                            <button type="submit" class="btn btn-primary rounded-0">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php endif; ?>
        
        <div class="row row-cards">

            <div class="col-sm-12 col-lg-4">
                <div class="card">
                    <div class="card-body p-3 text-center">
                    <div class="text-right text-green">
                            F CFA
                        </div>
                        <div class="h3 mb-2"><?= number_format($cumul_candidats, 0, ',', ' ')  ?></div>
                        <div class="text-muted mb-4">
                            Reste à payer des apprenants
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-4">
                <div class="card">
                    <div class="card-body p-3 text-center">
                    <div class="text-right text-green">
                            F CFA
                        </div>
                        <div class="h3 mb-2"><?= number_format($prevision_commission, 0, '', ' ')  ?> </div>
                        <div class="text-muted mb-4">
                            Prévision commission
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-4">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-right text-green">
                            F CFA
                            <!-- <i class="fe fe-chevron-up"></i> -->
                        </div>
                        <div class="h3 m-0"><?= number_format($dette_commercial, 0, ',', ' ') ?></div>
                        <div class="text-muted mb-4">
                            Total à payer aux commerciaux
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-4">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-right text-green">
                            F CFA
                            <!-- <i class="fe fe-chevron-up"></i> -->
                        </div>
                        <div class="h3 m-0"><?= number_format($solde_2, 0, ',', ' ') ?></div>
                        <div class="text-muted mb-4">
                            Solde restant
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <h2 class="page-title mb-5">
            Diagrammes
        </h2>

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Nombre d'inscrits des 30 derniers jours</h3>
                    </div>
                    <div class="card-body">
                    <div id="chart-data" style="height: 16rem"></div>
                    </div>
                </div>
                
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Aperçu des paiements</h3>
                    </div>
                    <div class="card-body">
                    <div id="chart-pie" style="height: 16rem"></div>
                    </div>
                </div>
                
            </div>
        </div>

        <h2 class="page-title mb-5">
            Retraits et paiements
        </h2>
        <div class="row">
            <?php if (type_profil() != SUPERVISEUR): ?>
                <div class="card col-lg-6 col-sm-12">
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
            <?php endif; ?>

            <div class="card <?= type_profil() != SUPERVISEUR ? 'col-lg-5 offset-lg-1' : 'col-lg-12' ?> col-sm-12">
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
                                        <td class="text-nowrap" colspan="2">
                                            <?php 
                                                $date = date_diff(date_create($paiement->date), date_create())->format('%d');
                                                // echo $date == '0' ? "Aujourd'hui" : "Il y a ". $date . " jour(s)"
                                                switch ($date) {
                                                    case '0':
                                                        echo "Aujourd'hui";
                                                        break;
                                                    case '1':
                                                        echo "Hier";
                                                        break;
                                                    case '2':
                                                        echo "Avant-hier";
                                                        break;
                                                    default:
                                                        if (in_array($date, ['3','4','5','6'])) {
                                                            echo 'Il y a '. $date . ' jours';
                                                        } else {
                                                            echo 'le '. date_format(date_create($paiement->date), "j M y");
                                                        }
                                                        break;
                                                }
                                            ?>
                                        </td>
                                    </tr>
                            <?php endforeach;
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card col-lg-6 col-sm-12">
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
            <div class="card col-lg-5 offset-lg-1 col-sm-12">
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
            <!-- <div class="card col-lg-6 col-sm-12">
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
            </div> -->

            
        </div>
    </div>
</div>