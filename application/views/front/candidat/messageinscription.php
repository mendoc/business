<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation enregistrement du candidat - Ecole 241 Business</title>
    <link rel="stylesheet" href="<?= theme_url() ?>assets/css/messageinscription.css">

    <?php if (ENVIRONMENT !== 'development') : ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-4D8CEC5J5T"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', 'G-4D8CEC5J5T');
        </script>
        <!-- Hotjar Tracking Code for https://business.ecole241.org -->
        <script>
            (function(h, o, t, j, a, r) {
                h.hj = h.hj || function() {
                    (h.hj.q = h.hj.q || []).push(arguments)
                };
                h._hjSettings = {
                    hjid: 2094197,
                    hjsv: 6
                };
                a = o.getElementsByTagName('head')[0];
                r = o.createElement('script');
                r.async = 1;
                r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
                a.appendChild(r);
            })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
        </script>
        <!-- Facebook Pixel Code -->
        <script>
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '166742078436085');
            fbq('track', 'PageView');
            fbq('track', 'ViewContent');
            fbq('track', 'CompleteRegistration');
        </script>
        <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=166742078436085&ev=PageView&noscript=1" /></noscript>
        <!-- End Facebook Pixel Code -->
    <?php endif; ?>

</head>

<body>
    <div class="logo">
    <img src="<?= theme_url() ?>assets/images/blue.png" alt=" logo Ecole241 Business" width="130px" height="90px">
    </div>
    <main>

         <div class="photo"></div>
        <section id="validation">
            <div class="vali">
                <div class="yes">
                    <img src="data:image/png;base64,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" />
                </div>
            <h1>Félicitations</h1>
            
            <p>
                Votre inscription a été enregistrée avec succès.
            </p>
            <p>
                Un email récapitulant vos informations a été envoyé.
            </p><br>
            <a href="<?= site_url() ?>" class="btn-retour">Retour à l'accueil</a>
            </div>
        </section>
    </main>
    <footer>
            <div class="footer-contenair">
                <p>&copy Copyright Ecole241Business</p>
                <a href="tel:+241 62 13 07 07" class="contacts">(+241) 62 13 07 07 |</a>
                <a href="mailto:business@ecole241.org">business@ecole241.org</a>
                <!-- <a href="https://ecole241.org" class="footerBadge footerBadge--production">Réalisé par <span>Ecole 241</span></a> -->
            </div>
        </footer>
               
</html>