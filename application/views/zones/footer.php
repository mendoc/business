</div>
<?php if (!est_un_gestionnaire()) : ?>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-4 text-center">
                            <ul class="list-unstyled mb-0">
                                <li><a href="<?= site_url('commercial') ?>">Statistiques</a></li>
                            </ul>
                        </div>
                        <div class="col-4 text-center">
                            <ul class="list-unstyled mb-0">
                                <li><a href="<?= site_url('commercial/transactions') ?>">Transactions</a></li>
                            </ul>
                        </div>
                        <div class="col-4 text-center">
                            <ul class="list-unstyled mb-0">
                                <li><a href="<?= site_url('commercial/ressources') ?>">Ressources</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<footer class="footer">
    <div class="container">
        <div class="row align-items-center flex-row-reverse">
            <div class="col-auto ml-lg-auto">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <a href="mailto:contact@ecole241.org" class="btn d-none btn-outline-danger btn-sm">Signaler un problème</a>

						<?php if (est_un_gestionnaire()) : ?>
                        	<a href="<?= site_url('commercial/deconnexion') ?>" class="btn btn-outline-danger btn-sm">Déconnexion</a>
						<?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
                Copyright © <?= date('Y') ?> <a href="https://ecole241.org">ecole 241</a>. Plateforme créée par les apprenants. Tous droits réservés.
            </div>
        </div>
    </div>
</footer>
</div>

<script>
    require.config({
        shim: {
            'bootstrap': ['jquery'],
            'sparkline': ['jquery'],
            'tablesorter': ['jquery'],
            'vector-map': ['jquery'],
            'vector-map-de': ['vector-map', 'jquery'],
            'vector-map-world': ['vector-map', 'jquery'],
            'core': ['bootstrap', 'jquery'],
        },
        paths: {
            'core': '<?= theme_url() ?>assets/js/core',
            'jquery': '<?= theme_url() ?>assets/js/vendors/jquery-3.2.1.min',
            'bootstrap': '<?= theme_url() ?>assets/js/vendors/bootstrap.bundle.min',
            'sparkline': '<?= theme_url() ?>assets/js/vendors/jquery.sparkline.min',
            'selectize': '<?= theme_url() ?>assets/js/vendors/selectize.min',
            'tablesorter': '<?= theme_url() ?>assets/js/vendors/jquery.tablesorter.min',
            'vector-map': '<?= theme_url() ?>assets/js/vendors/jquery-jvectormap-2.0.3.min',
            'vector-map-de': '<?= theme_url() ?>assets/js/vendors/jquery-jvectormap-de-merc',
            'vector-map-world': '<?= theme_url() ?>assets/js/vendors/jquery-jvectormap-world-mill',
            'circle-progress': '<?= theme_url() ?>assets/js/vendors/circle-progress.min',
        }
    });
    window.tabler = {
        colors: {
            'blue': '#467fcf',
            'blue-darkest': '#0e1929',
            'blue-darker': '#1c3353',
            'blue-dark': '#3866a6',
            'blue-light': '#7ea5dd',
            'blue-lighter': '#c8d9f1',
            'blue-lightest': '#edf2fa',
            'azure': '#45aaf2',
            'azure-darkest': '#0e2230',
            'azure-darker': '#1c4461',
            'azure-dark': '#3788c2',
            'azure-light': '#7dc4f6',
            'azure-lighter': '#c7e6fb',
            'azure-lightest': '#ecf7fe',
            'indigo': '#6574cd',
            'indigo-darkest': '#141729',
            'indigo-darker': '#282e52',
            'indigo-dark': '#515da4',
            'indigo-light': '#939edc',
            'indigo-lighter': '#d1d5f0',
            'indigo-lightest': '#f0f1fa',
            'purple': '#a55eea',
            'purple-darkest': '#21132f',
            'purple-darker': '#42265e',
            'purple-dark': '#844bbb',
            'purple-light': '#c08ef0',
            'purple-lighter': '#e4cff9',
            'purple-lightest': '#f6effd',
            'pink': '#f66d9b',
            'pink-darkest': '#31161f',
            'pink-darker': '#622c3e',
            'pink-dark': '#c5577c',
            'pink-light': '#f999b9',
            'pink-lighter': '#fcd3e1',
            'pink-lightest': '#fef0f5',
            'red': '#e74c3c',
            'red-darkest': '#2e0f0c',
            'red-darker': '#5c1e18',
            'red-dark': '#b93d30',
            'red-light': '#ee8277',
            'red-lighter': '#f8c9c5',
            'red-lightest': '#fdedec',
            'orange': '#fd9644',
            'orange-darkest': '#331e0e',
            'orange-darker': '#653c1b',
            'orange-dark': '#ca7836',
            'orange-light': '#feb67c',
            'orange-lighter': '#fee0c7',
            'orange-lightest': '#fff5ec',
            'yellow': '#f1c40f',
            'yellow-darkest': '#302703',
            'yellow-darker': '#604e06',
            'yellow-dark': '#c19d0c',
            'yellow-light': '#f5d657',
            'yellow-lighter': '#fbedb7',
            'yellow-lightest': '#fef9e7',
            'lime': '#7bd235',
            'lime-darkest': '#192a0b',
            'lime-darker': '#315415',
            'lime-dark': '#62a82a',
            'lime-light': '#a3e072',
            'lime-lighter': '#d7f2c2',
            'lime-lightest': '#f2fbeb',
            'green': '#5eba00',
            'green-darkest': '#132500',
            'green-darker': '#264a00',
            'green-dark': '#4b9500',
            'green-light': '#8ecf4d',
            'green-lighter': '#cfeab3',
            'green-lightest': '#eff8e6',
            'teal': '#2bcbba',
            'teal-darkest': '#092925',
            'teal-darker': '#11514a',
            'teal-dark': '#22a295',
            'teal-light': '#6bdbcf',
            'teal-lighter': '#bfefea',
            'teal-lightest': '#eafaf8',
            'cyan': '#17a2b8',
            'cyan-darkest': '#052025',
            'cyan-darker': '#09414a',
            'cyan-dark': '#128293',
            'cyan-light': '#5dbecd',
            'cyan-lighter': '#b9e3ea',
            'cyan-lightest': '#e8f6f8',
            'gray': '#868e96',
            'gray-darkest': '#1b1c1e',
            'gray-darker': '#36393c',
            'gray-dark': '#6b7278',
            'gray-light': '#aab0b6',
            'gray-lighter': '#dbdde0',
            'gray-lightest': '#f3f4f5',
            'gray-dark': '#343a40',
            'gray-dark-darkest': '#0a0c0d',
            'gray-dark-darker': '#15171a',
            'gray-dark-dark': '#2a2e33',
            'gray-dark-light': '#717579',
            'gray-dark-lighter': '#c2c4c6',
            'gray-dark-lightest': '#ebebec'
        }
    };

    let link = document.querySelector(`.nav-link[href="${location.href}"]`);
    if (link) link.classList.add('active');
</script>

<!-- Votre JS ici -->
<?php if (current_url() == site_url('gestionnaire')): ?>
    <script>
        require(['c3', 'jquery'], function(c3, $) {
            $(document).ready(function(){
            // const chartElt = document.getElementById('chart-data');
            // const joursTab = chartElt.getAttribute('data-jours').split(',');
            // const nombreInscritTab = chartElt.getAttribute('data-number').split(',');
            var chart = c3.generate({
                bindto: '#chart-data', // id of chart wrapper
                data: {
                    columns: [
                        // each columns data
                        ['data1', <?= $nombre_inscrits ?>],
                    ],
                    type: 'line', // default type of chart
                    colors: {
                        'data1': tabler.colors["blue"],
                    },
                    names: {
                        // name of each serie
                        'data1': "Nombre d'inscrit Par jour",
                    }
                },
                axis: {
                    x: {
                        type: 'category',
                        // name of each category
                            categories: [<?php foreach(explode(',', $jours) as $jour) {
                                echo "\"". $jour . "\",";
                            } ?>]
                    },
                },
                legend: {
                        show: false, //hide legend
                },
                padding: {
                    bottom: 0,
                    top: 0
                },
            });
        });
        });
    </script>

    <script>
        require(['c3', 'jquery'], function(c3, $) {
        $(document).ready(function(){
            var chart = c3.generate({
                bindto: '#chart-pie', // id of chart wrapper
                data: {
                    columns: [
                        // each columns data
                        ['data1', <?= isset($nb_candidats) ? $nb_candidats : 0 ?>],
                        ['data2', <?= isset($nb_apprenants) && isset($nb_vrai_apprenants) ? $nb_apprenants - $nb_vrai_apprenants : 0 ?>],
                        ['data3', <?= isset($nb_vrai_apprenants) ? $nb_vrai_apprenants : 0 ?>],
                    ],
                    type: 'pie', // default type of chart
                    colors: {
                        'data1': tabler.colors["red-dark"],
                        'data2': tabler.colors["yellow"],
                        'data3': tabler.colors["green"],
                    },
                    names: {
                        // name of each serie
                        'data1': 'Les candidats',
                        'data2': 'Les aspirants',
                        'data3': 'Les affiliés',
                    }
                },
                axis: {
                },
                legend: {
                    show: true, //hide legend
                },
                padding: {
                    bottom: 0,
                    top: 0
                },
            });
        });
        });
    </script>
<?php endif; ?>

<script>
    (function() {
        let id_com = <?= isset($id_com) ? $id_com : 0 ?>;
        let btns = document.querySelectorAll('button.action');
        btns.forEach(btn => {
            btn.addEventListener('click', e => {
                if (btn.classList.contains('generer')) {
                    btn.classList.toggle('d-none')
                    btn.parentNode.querySelector('.btn-loading').classList.toggle('d-none');
                    genererLien(btn.dataset.ressource, id_com, ret => {
                        if (ret) {
                            btn.parentNode.querySelector('.btn-loading').classList.toggle('d-none');
                            let btnCopier = btn.parentNode.querySelector('button.copier');
                            btnCopier.classList.toggle('d-none');
                            if (ret.ressource) {
                                console.log(ret.ressource)
                                btnCopier.dataset.lien = "<?= site_url('partage/') ?>" + ret.ressource;
                            }
                        } else {
                            btn.parentNode.querySelector('.btn-loading').classList.toggle('d-none');
                            btn.classList.toggle('d-none');
                        }
                    });
                } else if (btn.classList.contains('copier')) {
                    copierLien(btn.dataset.lien);
                    let ancienText = btn.innerHTML;
                    btn.textContent = 'Lien copié';
                    setTimeout(() => {
                        btn.innerHTML = ancienText;
                    }, 3000)
                }
            })
        })

        function genererLien(id_res, id_com, cb) {
            fetch("<?= site_url('commercial/generer_lien') ?>", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `id_res=${id_res}&id_com=${id_com}`
                }).then(ret => {
                    return ret.json();
                }).then(json => {
                    console.log(json);
                    cb(json);
                })
                .catch(err => {
                    console.error(err);
                    cb(false);
                })
        }

        function copierLien(chaine) {
            const el = document.createElement('textarea');
            el.value = chaine;
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);
        }
    })();
</script>
</body>

</html>
