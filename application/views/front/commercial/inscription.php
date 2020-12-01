<!DOCTYPE html>
<html lang="fr">

<head>
	<title>Inscription commercial - Ecole 241 Business</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="icon" type="image/png" href="<?= theme_url() ?> images/icons/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="<?= theme_url() ?>assets/css/main.css" />
	<!--===============================================================================================-->

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
			(function(h,o,t,j,a,r){
				h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
				h._hjSettings={hjid:2094197,hjsv:6};
				a=o.getElementsByTagName('head')[0];
				r=o.createElement('script');r.async=1;
				r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
				a.appendChild(r);
			})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
		</script>
	<?php endif; ?>
</head>

<body>
	<!--============== Start of the container =====================-->
	<div class="container">
		<!--===*** The left ***===-->
		<div class="left">
			<div class="logo">
				<img src=" <?= theme_url() ?>images/logoecole241.png" alt="logo de l'Ecole 241 BUSINESS" />
			</div>
			<div class="header">
				<h2 class="animation a1">Création de compte commercial</h2>
			</div>
			<!--===*** Start of Form ***===-->
			<form class="form" action="<?= site_url('commercial/traitement_inscription') ?>" method='post'>
				<input type="text" name="nom" class="form-field animation a3" placeholder="Nom Ex. BIVINGOU" required />
				<input type="text" name="prenom" class="form-field animation a3" placeholder="Prenom Ex. Pascale" />

				<fieldset class="animation a3">
					<label for="name">Votre sexe</label>
					<input type="radio" name="sexe" value="H" checked required /><label for="homme">H</label>
					<input type="radio" name="sexe" value="F" required /><label for="femme">F</label>
				</fieldset>

				<fieldset class="animation a3">
					<label for="name">Date de naissance</label>
					<input type="date" name="date_n" value="1989-02-15" required class="form-field animation a3" />
				</fieldset>
				<input type="email" name="email" required class="form-field animation a3" placeholder="Votre adresse e-mail" />

				<input type="tel" name="num_tel" required class="form-field animation a3" placeholder="Numéro de téléphone Ex. 077 01 89 00" />

				<input type="tel" name="num_what" class="form-field animation a3" placeholder="Numéro WhatsApp Ex. 077 01 89 00" />

				<input type="text" name="nom_util" required class="form-field animation a3" placeholder="Nom utilisateur Ex. Maviogha" />

				<input type="password" name="mot_passe" required class="form-field animation a4" placeholder="Votre mot de passe" />

				<input type="password" name="confirm_pass" required class="form-field animation a4" placeholder="Confirmez votre mot de passe" />

				<button type='submit' class="animation a6">S'inscrire</button>

				<p class="animation a3">Si vous avez un compte, alors vous pouvez vous connecter <a href="<?= site_url('commercial/connexion') ?>">ici</a></p>
			</form>
			<!--===*** End of Form ***===-->
		</div>
		<!--===*** The right ***===-->
		<div class="right"></div>
	</div>
	<!--============== End of the container =====================-->
	<!--================ File JS =======================-->
	<script src="js/main.js"></script>
</body>

</html>