<body class="">
    <div class="page">
        <div class="page-main">
            <div class="header py-4">
                <div class="container">
                    <div class="d-flex align-items-center">
                        <a class="header-brand" href="<?= est_un_gestionnaire() ? site_url('gestionnaire') : site_url('commercial') ?>">
                            <img src="<?= theme_url() ?>assets/images/logo.png" style="height: 50px" alt="tabler logo">
                        </a>
                        <div class="d-flex order-lg-2 ml-auto">
                            <div class="nav-item d-none d-md-flex">
                                <a href="<?= est_un_gestionnaire() ? site_url('gestionnaire/deconnexion') : site_url('commercial/deconnexion') ?>" class="btn btn-sm btn-outline-primary">Déconnexion</a>
                            </div>
                            <div class="dropdown">
                                <a class="nav-link pr-0 leading-none">
                                    <span class="avatar" style="background-image: url(<?= theme_url() ?>demo/faces/male/41.jpg)"></span>
                                    <span class="ml-2 d-none d-lg-block">
                                        <span class="text-default"><?= est_un_gestionnaire() ? $this->session->nom_gest : $this->session->nom_com ?></span>
                                        <small class="text-muted d-block mt-1"><?= est_un_gestionnaire() ? 'Gestionnaire' : 'Commercial' ?></small>
                                    </span>
                                </a>
                            </div>
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
                                <button data-lien="<?= $this->session->hash ? site_url('partage/') . $this->session->hash : "" ?>" class="btn btn-success action copier"><i class="fe fe-copy"></i> Copier mon lien</button>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg order-lg-first">
                            <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                                <li class="nav-item m-0">
                                    <a href="<?= est_un_gestionnaire() ? site_url('gestionnaire') : site_url('commercial') ?>" class="nav-link m-0 m-0"><i class="fa fa-bar-chart"></i> Statistiques</a>
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
                                    <li class="nav-item  m-0 dropdown">
                                        <a href="javascript:void(0)" class="nav-link m-0" data-toggle="dropdown"><i class="fe fe-file"></i> Contenus</a>
                                        <div class="dropdown-menu dropdown-menu-arrow">
                                            <a href="<?= site_url('gestionnaire/ressources') ?>" class="dropdown-item"><i class="fe fe-film"></i> Ressources</a>
                                            <a href="<?= site_url('gestionnaire/thematiques') ?>" class="dropdown-item"><i class="fe fe-folder"></i> Thématiques</a>
                                        </div>
                                    </li>
                                <?php endif; ?>
                                <?php if (!est_un_gestionnaire()) : ?>
                                    <li class="nav-item  m-0">
                                        <a href="<?= site_url('commercial/ressources') ?>" class="nav-link m-0"><i class="fe fe-film"></i> Ressources</a>
                                    </li>
                                    <li class="nav-item  m-0 dropdown">
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
                            </ul>
                        </div>
                    </div>
                </div>
            </div>