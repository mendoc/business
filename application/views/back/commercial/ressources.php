<div class="my-3 my-md-5">
    <div class="container h-auto">
        <div class="page-header">
            <h1 class="page-title border-bottom">
                Images
            </h1>
        </div>
        <div class="row row-cards">
            <?php if (!isset($images) or count($images) == 0) : ?>
                <div class="text-center display-5 p-5 col-12 mx-auto">
                    <p class="page-title"> Aucune image publiée pour le moment</p>
                    <p>Toutes les images à partager s'afficheront ici.</p>
                </div>
            <?php else : ?>
                <?php foreach ($images as $image) : ?>
                    <div class="col-sm-6 col-md-3">
                        <div class="card p-3">
                            <a href="javascript:void(0)" class="mb-3">
                                <?php if ($image->type_res == 'Image') : ?>
                                    <img src="<?= base_url() ?>ressources/<?= $image->fichier ?>" alt="Photo by Nathan Guerrero" class="rounded">
                                <?php else : ?>
                                    <img src="<?= theme_url() ?>demo/photos/grant-ritchie-338179-500.jpg" alt="Photo by Nathan Guerrero" class="rounded">
                                <?php endif; ?>
                            </a>
                            <div class="d-flex align-items-center p-2">
                                <div>
                                    <div><?= $image->nom_res ?></div>
                                    <small class="d-block text-muted">Publié le <?= date_format(date_create($image->date_res), " d M à H:i"); ?></small>
                                </div>
                                <div class="ml-auto text-muted">
                                    <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fe fe-share-2 mr-1"></i></a>
                                </div>
                            </div>
                            <?php if (isset($image->lien_gen)) : ?>
                                <button data-lien="<?= site_url('partage/') . $image->lien_gen ?>" class="btn btn-outline-success mt-2 action copier">Copier le lien</button>
                            <?php else : ?>
                                <button data-ressource="<?= $image->id_res ?>" class="btn btn-outline-primary mt-2 action generer">Gérérer le lien</button>
                                <button class="btn btn-primary rounded-0 btn-loading mt-2 d-none action">&nbsp;</button>
                                <button class="btn btn-outline-success mt-2 action copier d-none">Copier le lien</button>
                            <?php endif; ?>
                        </div>

                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="container">
        <div class="page-header">
            <h1 class="page-title border-bottom">
                Vidéos
            </h1>
        </div>
        <div class="row row-cards">
            <?php if (!isset($videos) or count($videos) == 0) : ?>
                <div class="text-center display-5 p-5 col-12 mx-auto">
                    <p class="page-title"> Aucune vidéo publiée pour le moment</p>
                    <p>Toutes les vidéos à partager s'afficheront ici.</p>
                </div>
            <?php else : ?>
                <?php foreach ($videos as $video) : ?>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card p-3">
                            <i class="fe fe-feplay"></i>
                            <a href="javascript:void(0)" class="mb-3">
                                <div class="embed-responsive embed-responsive-16by9 rounded">
                                    <iframe width="420" height="315" src="<?= $video->lien ?>"></iframe>
                                </div>
                            </a>
                            <div class="d-flex align-items-center p-2">
                                <div>
                                    <div><?= $video->nom_res ?></div>
                                    <small class="d-block text-muted">Publié le <?= $video->date_res ?></small>
                                </div>
                                <div class="ml-auto text-muted">
                                    <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fe fe-share-2 mr-1"></i></a>
                                </div>
                            </div>
                            <?php if (isset($video->lien_gen)) : ?>
                                <button data-lien="<?= site_url('partage/') . $video->lien_gen ?>" class="btn btn-outline-success mt-2 action copier">Copier le lien</button>
                            <?php else : ?>
                                <button data-ressource="<?= $video->id_res ?>" class="btn btn-outline-primary mt-2 action generer">Gérérer le lien</button>
                                <button class="btn btn-primary rounded-0 btn-loading mt-2 d-none action">&nbsp;</button>
                                <button class="btn btn-outline-success mt-2 action copier d-none">Copier le lien</button>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="container">
        <div class="page-header">
            <h1 class="page-title border-bottom">
                Documents
            </h1>
        </div>
        <div class="row row-cards">
            <?php if (!isset($documents) or count($documents) == 0) : ?>
                <div class="text-center display-5 p-5 col-12 mx-auto">
                    <p class="page-title"> Aucun document publié pour le moment</p>
                    <p>Tous les documents à partager s'afficheront ici.</p>
                </div>
            <?php else : ?>
                <?php foreach ($documents as $document) : ?>
                    <div class="ml-3">
                        <div class="card p-3 flex-row">
                            <a href="javascript:void(0)" class="my-3">
                                <img height="80px" src="https://www.crossroadsfund.org/sites/default/files/document%20icon.png" alt="Photo by Nathan Guerrero" class="rounded">
                            </a>
                            <div class="d-flex flex-column p-2">
                                <div>
                                    <div><?= $document->nom_res ?></div>
                                    <small class="d-block text-muted">Publié le <?= date_format(date_create($document->date_res), " d M à H:i"); ?></small>
                                </div>
                                <div class="">
                                    <?php if (isset($document->lien_gen)) : ?>
                                        <button data-lien="<?= site_url('partage/') . $document->lien_gen ?>" class="btn btn-outline-success mt-2 action copier">Copier le lien</button>
                                    <?php else : ?>
                                        <button data-ressource="<?= $document->id_res ?>" class="btn btn-sm btn-outline-primary mt-2 action generer">Gérérer le lien</button>
                                        <button class="btn btn-primary btn-sm rounded-0 btn-loading mt-2 d-none action">&nbsp;</button>
                                        <button class="btn btn-outline-success btn-sm mt-2 action copier d-none">Copier le lien</button>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>