<main class="container">
<div class="my-3 my-md-5">
        <div class="details_centre">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Détails du candidat</h3>
            </div>
            <div class="card-body">
              <div class="block_details">
                <h5 class="font-weight-normal text-body">Nom:</h5>
                <p><?= $candidat->nom_prenom ?></p>
              </div>

              <div class="block_details">
                <h5 class="font-weight-normal text-body">sexe:</h5>
                <p><?= $candidat->sexe; ?></p>
              </div>

              <div class="block_details">
                <h5 class="font-weight-normal text-body">date de naissance:</h5>
                <p><?= $candidat->date_n ; ?></p>
              </div>

              <div class="block_details">
                <h5 class="font-weight-normal text-body">Adresse e-amil:</h5>
                <p><?= $candidat->email ; ?></p>
              </div>

              <div class="block_details">
                <h5 class="font-weight-normal text-body">Numéro de téléphone:</h5>
                <p><?= $candidat->num_tel ; ?></p>
              </div>

              <div class="block_details">
                <h5 class="font-weight-normal text-body">Numéro de téléphone whatsapp:</h5>
                <p><?php echo empty($candidat->num_what) ? 'Aucun': $candidat->num_what ; ?></p>
              </div>

              <div class="block_details">
                <h5 class="font-weight-normal text-body">Horaire de formation:</h5>
                <p><?= $candidat->horaire ; ?></p>
              </div>

              <div class="block_details">
                <h5 class="font-weight-normal text-body">Domaine d'activité:</h5>
                <p><?= $candidat->domaine_act ; ?></p>
              </div>

              <div class="block_details">
                <h5 class="font-weight-normal text-body">Type de service:</h5>
                <p><?= $candidat->type_serv; ?></p>
              </div>

              <div class="block_details">
                <h5 class="font-weight-normal text-body">Attentes:</h5>
                <p><?= $candidat->attentes ; ?></p>
              </div>
            </div>
          </div> 
          <div class="col-lg-6">
            
            <form class="mb-4" action="<?= site_url('gestionnaire/inscription_candidat/' . $candidat->id_can); ?>" method="POST">
              <div class="form-row">
                <div class="col">
                  <input type="number" name="montant" min="5000" class="form-control" placeholder="Montant">
                </div>
                <div class="col">
                  <input type="text" name="motif" class="form-control" placeholder="Motif">
                </div>
                <button type="submit" class="btn btn-primary">valider</button>
              </div>
            </form>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Liste de demandes de retraits</h3>
            </div>

            <div class="table-responsive">
              <table class="table card-table table-striped table-vcenter">
                <tbody>
                  <tr>
                    <td>Ronald Bradley</td>
                    <td>Initial commit</td>
                    <td class="text-nowrap">May 6, 2018</td>

                  </tr>
                  <tr>
                    <td>Russell Gibson</td>
                    <td>Main structure</td>
                    <td class="text-nowrap">April 22, 2018</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Beverly Armstrong</td>
                    <td>Left sidebar adjustments</td>
                    <td class="text-nowrap">April 15, 2018</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Bobby Knight</td>
                    <td>Topbar dropdown style</td>
                    <td class="text-nowrap">April 8, 2018</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Sharon Wells</td>
                    <td>Fixes #625</td>
                    <td class="text-nowrap">April 9, 2018</td>
                    <td> </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
      </div>

</main>