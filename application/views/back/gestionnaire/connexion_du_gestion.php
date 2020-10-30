<!DOCTYPE html>
<html lang="fr">

<head>
	<title>ECOLE 241 BUSINESS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= theme_url() ?>assets/css/connexion_du_gestionnaire.css">
	<!--===============================================================================================-->
</head>

<body>
	<main>
		<!--================= Start of the main =======================-->

		<!--==*** Logo ECOLE 241 BUSINESS ***==-->
		<div class="Logo">
			<a href="#" target="_blank">
				<img src="<?= theme_url() ?>assets/images/icon/Ebusiness.png"></a>
		</div>
		<!--==*** The title ***==-->
		<div class="allh">
			<h1>Connexion du gestionnaire</h1>
		</div>
		<!--==*** Start of the form ***==-->
		<form>
			<div class="group">
				<input type="mail"><span class="highlight"></span><span class="bar"></span>
				<label>Votre adresse mail</label>
			</div>
			<div class="group">
				<input type="password"><span class="highlight"></span><span class="bar"></span>
				<label>Votre mot de passe</label>
			</div>
			<button type="button" class="button buttonBlue">Se connecter
				<div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
			</button>
			<div class="link">
				<a href="#">Mot de passe oublié ?</a>
			</div>
			
		</form>
		<!--==***## End of the form ##***==-->
	</main>
	<!--================= End of the main =======================-->
	<!--================ File JS =======================-->
	<script src="<?= theme_url() ?>assets/js/formulaire_candidat.js"></script>
</body>

</html>