<body class="">
    <div class="page">
        <div class="page-main">
            <div class="header py-4">
                <div class="container">
                    <div class="d-flex align-items-center justify-content-between">
                        <a class="header-brand" href="<?= est_un_gestionnaire() ? site_url('gestionnaire') : site_url('commercial') ?>">
                            <img src="<?= theme_url() ?>assets/images/logo.png" style="height: 50px" alt="tabler logo">
                        </a>
                        <div class="">
                            <div>
                                <?php if (!est_un_gestionnaire()) : ?>
                                    <button data-lien="<?= $this->session->raccourci ? $this->session->raccourci : site_url('partage/') . $this->session->hash ?>" class="btn btn-success d-lg-none action copier"><i class="fe fe-copy"></i> Copier mon lien</button>
                                <?php endif; ?>
                                <a href="<?= est_un_gestionnaire() ? site_url('gestionnaire/deconnexion') : site_url('commercial/deconnexion') ?>" class="btn  btn-sm btn-outline-primary d-none d-md-inline ">Déconnexion</a>
                            </div>
                            <a class="pr-0  d-none d-lg-block">
                                <span class="d-none avatar" style="background-image: url(<?= theme_url() ?>demo/faces/male/41.jpg)"></span>
                                <span class="ml-2 d-lg-block">
                                    <span class="text-default"><?= est_un_gestionnaire() ? $this->session->nom_gest : $this->session->nom_com ?></span>
                                    <small class="text-muted d-block mt-1"><?= est_un_gestionnaire() ? 'Gestionnaire' : 'Commercial' ?></small>
                                </span>
                            </a>
                            <a href="<?= site_url('commercial/deconnexion') ?>" class="btn d-none btn-outline-danger btn-sm">Déconnexion</a>
                        </div>
                        <a class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                            <span class="header-toggler-icon"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 ml-auto">
                            <form class="input-icon my-3 my-lg-0 d-none">
                                <input type="search" class="form-control header-search" placeholder="Rechercher" tabindex="1">
                                <div class="input-icon-addon">
                                    <i class="fe fe-search"></i>
                                </div>
                            </form>
                            <?php if (!est_un_gestionnaire()) : ?>
                                <button data-lien="<?= $this->session->raccourci ? $this->session->raccourci : site_url('partage/') . $this->session->hash ?>" class="btn d-none btn-success action copier"><i class="fe fe-copy"></i> Copier mon lien</button>
                                
                                
                            <?php endif; ?>
                        </div>
                        <div class="col-lg order-lg-first">
                            <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                                <li class="nav-item m-0">
                                    <a href="<?= est_un_gestionnaire() ? site_url('gestionnaire') : site_url('commercial') ?>" class="nav-link m-0"><i class="fa fa-bar-chart"></i> Statistiques</a>
                                </li>
                                <?php if (est_un_gestionnaire()) : ?>
                                    <li class="nav-item  m-0 dropdown">
                                        <a href="javascript:void(0)" class="nav-link m-0" data-toggle="dropdown"><i class="fe fe-users"></i> Comptes</a>
                                        <div class="dropdown-menu dropdown-menu-arrow">
                                            <a href="<?= site_url('gestionnaire/candidats') ?>" class="dropdown-item">Candidats</a>
                                            <a href="<?= site_url('gestionnaire/commerciaux') ?>" class="dropdown-item">Commerciaux</a>
                                            <a href="<?= site_url('gestionnaire/gestionnaires') ?>" class="dropdown-item">Gestionnaires</a>
                                        </div>
                                    </li>
                                <?php endif; ?>
                                <?php if (est_un_gestionnaire()) : ?>
                                    <li class="nav-item  m-0">
                                        <a href="<?= site_url('gestionnaire/ressources') ?>" class="nav-link m-0"><i class="fe fe-file"></i> Ressources</a>
                                    </li>
                                <?php endif; ?>
                                <?php if (!est_un_gestionnaire()) : ?>
                                    <li class="nav-item  m-0">
                                        <a href="<?= site_url('commercial/ressources') ?>" class="nav-link m-0"><i class="fe fe-film"></i> Ressources</a>
                                    </li>
                                    <li class=" d-none nav-item  m-0 dropdown">
                                        <a href="<?= site_url('commercial/partages') ?>" class="nav-link m-0"><i class="fe fe-share-2"></i> Partages</a>
                                    </li>
                                <?php endif; ?>
                                <?php if (est_un_gestionnaire()) : ?>
                                    <li class="nav-item  m-0 dropdown">
                                        <a href="javascript:void(0)" class="nav-link m-0" data-toggle="dropdown"><i class="fa fa-money"></i> Transactions</a>
                                        <div class="dropdown-menu dropdown-menu-arrow">
                                            <a href="<?= site_url('gestionnaire/transactions_candidats') ?>" class="dropdown-item"><i class="fe fe-film"></i> Candidats</a>
                                            <a href="<?= site_url('gestionnaire/transactions_commercial') ?>" class="dropdown-item"><i class="fe fe-folder"></i> Commercials</a>    
                                        </div>
                                    </li>
                                <?php else : ?>
                                    <li class="nav-item  m-0 dropdown">
                                        <a href="<?= site_url('commercial/transactions') ?>" class="nav-link m-0"><i class="fa fa-money"></i> Transactions</a>
                                    </li>
                                <?php endif; ?>

                                    <!-- <li class="nav-item  m-0 dropdown">
                                        <a href="" class="nav-link m-0"><i class="fa fa-play-circle"></i> Comment ça marche?</a>
                                    </li> -->
                                    <li class="nav-item  m-0 dropdown">
                                        <a href="https://wa.me/24102130707" class="nav-link m-0"><i class="fa fa-whatsapp"></i>Aide</a>
                                    </li>

                                    <li style="margin-bottom: 15px; margin-left: 15px">
                                    <a href="<?= site_url('commercial/deconnexion') ?>" class="btn d-md-none btn-outline-danger btn-sm">Déconnexion</a>
                                    </li>



                            </ul>
                        </div>
                    </div>
                </div>
            </div>