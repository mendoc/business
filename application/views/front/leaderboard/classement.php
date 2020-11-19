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

    <?php if (ENVIRONMENT !== 'development') : ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-4D8CEC5J5T"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag("js", new Date());

            gtag("config", "G-4D8CEC5J5T");
        </script>
    <?php endif; ?>

    <script>
        setInterval(() => {
            location.reload()
        }, 60000);
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
        <table class="c-table">
            <thead class="c-table__head">
                <tr class="c-table__head-row">
                    <th class="c-table__head-cell u-text--center">Rang</th>
                    <th class="c-table__head-cell">Commercial</th>
                    <th class="c-table__head-cell">Visites</th>
                    <th class="c-table__head-cell u-text--right">Candidats</th>
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
                            <strong><?= $commercial->nb_candidats ?></strong>
                        </td>
                        <td class="c-table__cell c-table__cell--points u-text--right">
                            <span><?= $commercial->nbr_visite == 0 ? 0  : number_format(($commercial->nb_candidats / $commercial->nbr_visite) * 100, 1,",", " " ); 
                                      ?></span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
