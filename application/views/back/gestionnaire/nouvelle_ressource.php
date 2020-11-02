<div class="my-3 my-md-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-auto mx-auto col-lg-7">
                <form action="<?= site_url('gestionnaire/traitement_nouvelle_ressource') ?>" method="post" class="card">
                    <div class="card-header">
                        <h3 class="card-title">Créer une ressource</h3>
                    </div>
                    <div class="card-body col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Nom de la ressource</label>
                                    <input type="text" class="form-control" name="nom_res" placeholder="Nom de la ressource">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Thematique</label>
                                    <select name="thematique" id="select-beast" class="form-control custom-select">
                                        <?php foreach ($thematiques as $thematique) : ?>
                                            <option value="<?= $thematique->id_them ?>"><?= $thematique->titre ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Type de ressource</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="type_res" value="Image" class="selectgroup-input" checked="">
                                            <span class="selectgroup-button">Image</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="type_res" value="Vidéo" class="selectgroup-input">
                                            <span class="selectgroup-button">Vidéo</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="type_res" value="PDF" class="selectgroup-input">
                                            <span class="selectgroup-button">PDF</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="type_res" value="Article" class="selectgroup-input">
                                            <span class="selectgroup-button">Article</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label">Ajouter un fichier</div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="fichier_res">
                                            <label class="custom-file-label">Choisis un fichier</label>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right mt-5">
                                        <div class="d-flex">
                                            <a href="javascript:void(0)" class="btn btn-link">Annuler</a>
                                            <button type="submit" class="btn btn-primary ml-auto">Créer la ressource</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>