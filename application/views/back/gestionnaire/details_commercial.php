<div class="contes">
    
    <div class="card-row-5 my-md-5  my-3 conte2" >
        <div class="">
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
    </div>
    <main class="conte3 ">
        <div class="my-3 my-md-5">
           <div class="details_centre">
                <div class="card">
                     <div class="card-header">
                     <h3 class="card-title">Détails du commercial</h3>
                </div>
                     
                <div class="card-body  ">
                  <table class="table ">
                    <tr>
                      <td>Nom:</td>
                      <td class="text-right">
                        <span class="badge badge-default ">abiba ndomdi samasi</span>
                      </td>
                    </tr>
                    <tr>
                      <td>Sexe</td>
                      <td class="text-right">
                        <span class="badge badge-default ">F</span>
                      </td>
                    </tr>
                    <tr>
                      <td>Age</td>
                      <td class="text-right">
                        <span class="badge badge-default">25</span>
                      </td>
                    </tr>
                    <tr>
                      <td>Numéro whatsapp</td>
                      <td class="text-right">
                        <span class="badge badge-default">74302192</span>
                      </td>
                    </tr>
                    <tr>
                      <td>visites</td>
                      <td class="text-right">
                        <span class="badge  badge-warning">45</span>
                      </td>
                    </tr>
                    <tr>
                      <td>Inscrits en ligne</td>
                      <td class="text-right">
                        <span class="badge badge-warning">45</span>
                      </td>
                    </tr>
                    <tr>
                      <td>Inscrits en presentiel</td>
                      <td class="text-right">
                        <span class="badge badge-warning">0</span>
                      </td>
                    </tr>
                    <tr>
                      <td>Affiliés en ligne</td>
                      <td class="text-right">
                        <span class="badge badge-success">45</span>
                      </td>
                    </tr>
                    <tr>
                      <td> Affiliés en presentiel</td>
                      <td class="text-right">
                        <span class="badge badge-success">0</span>
                      </td>
                    </tr>
                    <tr>
                      <td>Total total affiliés</td>
                      <td class="text-right">
                        <span class="badge  badge-success">45</span>
                      </td>
                    </tr>
                    <tr>
                      <td> retrait</td>
                      <td class="text-right">
                        <span class="badge  badge-danger">0</span>
                      </td>
                    </tr>
                    <tr>
                      <td>solde</td>
                      <td class="text-right">
                        <span class="badge badge-danger">0</span>
                      </td>
                    </tr>
                    
                  </table>
                </div>
              </div>
             </div>         
        </div>
    </main> 

</div>
<div class=" my-md-5  conte1 my-3">
<div class="card-header">
            <h3 class="card-title">Derniers paiements</h3>
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
    
