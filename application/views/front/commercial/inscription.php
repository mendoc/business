<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>ECOLE 241 BUSINESS</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" type="image/png" href="<?= theme_url() ?> images/icons/favicon.ico" />
		<link
			rel="stylesheet"
			type="text/css"
			href="<?= theme_url() ?>assets/css/main.css"
		/>
		<!--===============================================================================================-->
	</head>

	<body>
		<!--============== Start of the container =====================-->
		<div class="container">
			<!--===*** The left ***===-->
			<div class="left">
				<div class="logo">
					<img src=" <?= theme_url() ?>assets/images/Ebusiness.png" alt="logo de l'Ecole 241 BUSINESS" />
				</div>
				<div class="header">
					<h2 class="animation a1">Inscription du Commercial</h2>
				</div>
				<!--===*** Start of Form ***===-->
				<form class="form" action="<?= site_url('commercial/traitement_inscription') ?>" method='post'>
					<input
						type="text"
						name="nom"
						class="form-field animation a3"
						placeholder="Nom Ex. SAMBA"
					/>
					<input
						type="text"
						name="prenom"
						class="form-field animation a3"
						placeholder="Prenom Ex. Pscale"
					/>

					<fieldset>
						<label for="name">Votre sexe</label>
						<input type="radio" name="sexe" value="homme" /><label for="homme">H</label>
						<input type="radio" name="sexe" value="femme" /><label for="femme">F</label>
					</fieldset>

					<fieldset>
						<label for="name">Date de naissance</label>
						<input type="date" name="date_n" class="form-field animation a3" />
					</fieldset>
					<input
						type="email"
						name="email"
						class="form-field animation a3"
						placeholder="Adresse mail"
					/>

					<input
						type="tel"
						name="num_tel"
						class="form-field animation a3"
						placeholder="Numéro de téléphone Ex. 077 01 89 00"
					/>

					<input
						type="tel"
						name="num_what"
						class="form-field animation a3"
						placeholder="Numéro de téléphone WhatsApp Ex. 077 01 89 00"
					/>

					<input
						type="text"
						name="nom_util"
						class="form-field animation a3"
						placeholder="Nom utilisateur Ex. Maviogha"
					/>

					<input
						type="password"
						name="mot_passe"
						class="form-field animation a4"
						placeholder="Votre mot de passe"
					/>

					<input
						type="password"
						name="mot de passe"
						class="form-field animation a4"
						placeholder="Confirmez votre mot de passe"
					/>

					<button type='submit' class="animation a6">S'inscrire</button>
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
