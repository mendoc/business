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
                            <span><?= number_format(($commercial->nb_candidats / $commercial->nbr_visite) * 100, 1,",", " " )  ?> %</span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Code injected by live-server -->
    <script type="text/javascript">
        // <![CDATA[  <-- For SVG support
        if ('WebSocket' in window) {
            (function() {
                function refreshCSS() {
                    var sheets = [].slice.call(document.getElementsByTagName("link"));
                    var head = document.getElementsByTagName("head")[0];
                    for (var i = 0; i < sheets.length; ++i) {
                        var elem = sheets[i];
                        var parent = elem.parentElement || head;
                        parent.removeChild(elem);
                        var rel = elem.rel;
                        if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
                            var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                            elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
                        }
                        parent.appendChild(elem);
                    }
                }
                var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
                var address = protocol + window.location.host + window.location.pathname + '/ws';
                var socket = new WebSocket(address);
                socket.onmessage = function(msg) {
                    if (msg.data == 'reload') window.location.reload();
                    else if (msg.data == 'refreshcss') refreshCSS();
                };
                if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                    console.log('Live reload enabled.');
                    sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
                }
            })();
        } else {
            console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
        }
        // ]]>
    </script>
</body>

</html>