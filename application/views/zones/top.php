
<body class="">
  <div class="page">
    <div class="page-main">
      <div class="header py-4">
        <div class="container">
          <div class="d-flex">
            <a class="header-brand" href=".">
              <img src="<?= theme_url() ?>demo/brand/tabler.svg" class="header-brand-img" alt="tabler logo">
            </a>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="nav-item d-none d-md-flex">
                <a href="." class="btn btn-sm btn-outline-primary">Déconnexion</a>
              </div>
              <div class="dropdown">
                <a class="nav-link pr-0 leading-none">
                  <span class="avatar" style="background-image: url(<?= theme_url() ?>demo/faces/male/41.jpg)"></span>
                  <span class="ml-2 d-none d-lg-block">
                    <span class="text-default">Richard OGOULA</span>
                    <small class="text-muted d-block mt-1">Commercial</small>
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
              <form class="input-icon my-3 my-lg-0">
                <input type="search" class="form-control header-search" placeholder="Rechercher" tabindex="1">
                <div class="input-icon-addon">
                  <i class="fe fe-search"></i>
                </div>
              </form>
            </div>
            <div class="col-lg order-lg-first">
              <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                <li class="nav-item">
                  <a href="./index.html" class="nav-link active"><i class="fa fa-bar-chart"></i> Statistiques</a>
                </li>
                <li class="nav-item">
                  <a href="javascript:void(0)" class="nav-link"><i class="fe fe-film"></i> Ressources</a>
                </li>
                <li class="nav-item dropdown">
                  <a href="javascript:void(0)" class="nav-link"><i class="fe fe-share-2"></i> Partages</a>
                </li>
                <li class="nav-item dropdown">
                  <a href="javascript:void(0)" class="nav-link"><i class="fa fa-money"></i> Transactions</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>