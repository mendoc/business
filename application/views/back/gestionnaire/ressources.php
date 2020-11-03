<div class="my-3 my-md-5">
    <div class="container">
    <?php if (!empty($_SESSION['message'])) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?= $_SESSION['message'] ?></strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
        <div class="page-header">
            <h1 class="page-title">
               <i class="fe fe-film"></i> Ressources
            </h1>
        </div>
        <a href="<?= site_url('gestionnaire/nouvelle_ressource') ?>" class="btn btn-primary pull-right mb-5">Ajouter une ressource</a>
        <div class="card">
            <?php if (empty($ressources)) : ?>
                <div class="text-center display-5 p-5 col-12 mx-auto">
                    <p class="page-title">Aucune ressource créée pour le moment </p>
                    <p>Toutes les ressources s'afficheront ici.</p>
                </div>
            <?php else : ?>
                <div class="card-header">
                    <h3 class="card-title">Comptes gestionnaires</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Thématique</th>
                                <th>Type</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ressources as $ressource) : ?>
                                <tr>
                                    <td><a href="" class="text-inherit"><?= $ressource->nom_res; ?></a></td>
                                    <td><?= $ressource->titre; ?></td>
                                    <td><?= $ressource->type_res; ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item text-danger" href="<?= site_url('gestionnaire/supprimer_ressource/' . $ressource->id_res) ?>"> 
                                                    <i class="fa fa-trash" aria-hidden="true"></i> supprimer
                                                </a>
                                            </div>
                                        </div>
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