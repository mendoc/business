<html lang="fr">

<head>
    <meta charset="UTF-8" />

    <link rel="shortcut icon" type="image/x-icon" href="<?= theme_url() ?>favicon.png" />

    <title>Leaderboard - Ecole 241 Business</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="og:title" content="Leaderboard - Ecole 241 Business">
    <meta name="og:type" content="Site">
    <meta name="og:logo" content="<?= theme_url() ?>images/logoecole241.png" />
    <meta name="og:image" content="<?= theme_url() ?>images/logoecole241.png" />
    <meta name="og:url" content="<?= site_url('leaderboard') ?>" />
    <meta name="og:site_name" content="Leaderboard - Ecole 241 Business">
    <meta name="og:description" content="Le leaderboard Ecole 241 Business présente les performances des commerciaux.">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" />

    <link rel="stylesheet" href="<?= theme_url() ?>assets/css/leaderboard.css" />

    <script>
        setInterval(() => {
            location.reload()
        }, 5 * 60 * 1000);
    </script>
    
</head>

<body translate="no">
    <div class="l-wrapper" id="wrapper">
        <div class="c-headline">
            <h4 class="c-headline__title">
                <small class="u-text--danger">Ecole 241 Business</small><br />Leaderboard
            </h4>
            <span class="c-chip c-chip--success" onclick="javacript:location.reload()">Actualiser</span>
        </div>
        <div>
            <p>Dernière actualisation: <time> <?= date('G:i:s') ?> </time> <span class="float-right"><?= count($commerciaux) ?> commerciaux</span> </p>
            <table class="table mb-5">
                <thead class="table-head">
                    <tr class="">
                        <th colspan="2">Nombre d'apprenants</th>
                    </tr>
                </thead>
                <tbody class="table-body">
                    <tr class="table-row">
                        <td>En ligne</td>
                        <td><?= $nb_apprenant_ligne ?></td>
                    </tr>
                    <tr class="table-row">
                        <td>En presentiel</td>
                        <td><?= $nb_apprenant_presentiel ?></td>
                    </tr>
                    <tr class="table-row bg-dark">
                        <td>Total</td>
                        <td><?= $nb_apprenant_ligne + $nb_apprenant_presentiel ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <table class="c-table">
            <thead class="c-table__head">
                <tr class="c-table__head-row">
                    <th class="c-table__head-cell u-text--center">Rang</th>
                    <th class="c-table__head-cell">Commercial</th>
                    <th class="c-table__head-cell">Visites</th>
                    <th class="c-table__head-cell u-text--right">Candidats</th>
                    <th class="c-table__head-cell u-text--right">Aspirant</th>
                    <th class="c-table__head-cell u-text--right">Affiliés</th>
                    <th class="c-table__head-cell u-text--right">% Conv.</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($commerciaux as $key => $commercial) : ?>
                    <tr class="c-table__row">
                        <td class="c-table__cell c-table__cell--place u-text--center">
                            <span class="c-place <?= ($key == 0) ? 'c-place--first' : (($key == 1) ? 'c-place--second' : (($key == 2) ? 'c-place--third' : '')) ?>"><?= $key + 1 ?></span>
                        </td>
                        <td class="c-table__cell c-table__cell--name">
                            <?= $commercial->nom_prenom ?><br /><small style="opacity: 0.4; display:none">Racing Point</small>
                        </td>
                        <td class="c-table__cell c-table__cell--count"><small><?= $commercial->nbr_visite ?></small></td>
                        <td class="c-table__cell c-table__cell--points u-text--right">
                            <strong><?= $commercial->nb_inscrit ?></strong>
                        </td>
                        <td class="c-table__cell c-table__cell--points u-text--right">
                            <?= $commercial->nb_aspirant_com ?>
                        </td>
                        <td class="c-table__cell c-table__cell--points u-text--right">
                            <?= $commercial->nb_affilie ?>
                        </td>
                        <td class="c-table__cell c-table__cell--points u-text--right">
                            <span><?= $commercial->nbr_visite == 0 ? 0  : number_format(($commercial->nb_inscrit / $commercial->nbr_visite) * 100, 1,",", " " ); 
                                      ?></span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
