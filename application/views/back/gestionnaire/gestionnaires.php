<div class="my-3 my-md-5">
    <div class="container">
        <?php if ($this->session->flashdata('message-success')) : ?>
            <div class="alert alert-success alert-dismissible fade show font-weight-bold mt-5" role="alert">
                <?= $this->session->flashdata('message-success') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <div class="page-header">
            <h1 class="page-title">
                <i class="fa fa-users"></i> Gestionnaires
            </h1>
        </div>
        <?php if(type_profil() == GESTIONNAIRE || type_profil() == ADMIN) : ?>
            <form class="mb-4" action="<?= site_url('gestionnaire/ajouter_gestionnaire'); ?>" method="POST">
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="nom" class="form-control" required placeholder="Nom et prénom du gestionnaire">
                    </div>
                    <div class="col">
                        <input type="email" name="email" class="form-control" required placeholder="Son adresse e-mail">
                    </div>
                    <div class="col-2">
                        <input type="submit" class="form-control text-white bg-primary" value="valider">
                    </div>
                </div>
            </form>
        <?php endif; ?>
        <div class="card">
            <?php if (empty($gestionnaires)) : ?>
                <div class="text-center display-5 p-5 col-12 mx-auto">
                    <p class="page-title">Aucun compte gestionnaire pour le moment </p>
                    <p>La liste de tous les comptes pouvant gérer la plateforme s'affiche ici</p>
                </div>
            <?php else : ?>
                <div class="card-header">
                    <h3 class="card-title">Comptes gestionnaires</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th>Noms & prénoms</th>
                                <th>Adresse e-mail</th>
                                <th>Droits d'acces</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($gestionnaires as $gestionnaire) : ?>
                                <tr>
                                    <td><a href="" class="text-inherit"><?= $gestionnaire->nom_prenom; ?></a></td>
                                    <td><?= $gestionnaire->email_gest ?></td>
                                    <td>
                                        <?php if(type_profil() == ADMIN): ?>
                                            <form action="<?= site_url('gestionnaire/changer_droit/' . $gestionnaire->id_gest) ?>" method="post" class="col-lg-8 offset-lg-2 d-flex align-items-end">
                                                <select name="type_profil" class="custom-select">
                                                    <option <?= $gestionnaire->type_profil == 1 ? 'selected' : '' ?> value="1">Superviseur</option>
                                                    <option <?= $gestionnaire->type_profil == 2 ? 'selected' : '' ?> value="2">Tresorier</option>
                                                    <option <?= $gestionnaire->type_profil == 3 ? 'selected' : '' ?> value="3">Gestionnaire</option>
                                                    <option <?= $gestionnaire->type_profil == 4 ? 'selected' : '' ?> value="4">Administrateur</option>
                                                </select>
                                                <button type="submit" class="btn btn-primary rounded-0">
                                                    OK
                                                </button>
                                            </form>
                                        <?php else :
                                            // Si on est superviseur , On montre juste le type de profil
                                            switch ($gestionnaire->type_profil) {
                                                case SUPERVISEUR:
                                                    echo 'Superviseur';
                                                    break;
                                                case TRESORIER:
                                                    echo 'Tresorier';
                                                    break;
                                                case GESTIONNAIRE:
                                                    echo 'Gestionnaire';
                                                    break;
                                                case ADMIN:
                                                    echo 'Administrateur';
                                                    break;
                                                default:
                                                    // Aucune convenance
                                                    break;
                                            }
                                        endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>

        <nav aria-label="Page navigation Candidat" class="d-flex justify-content-center"> 
            <?= $liens ?>
        </nav>
    </div>

</div>