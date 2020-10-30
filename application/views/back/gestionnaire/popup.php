<!DOCTYPE html>
<html lang="fr">

<head>
	<title>ECOLE 241 BUSINESS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="clearassets/css/popup.css">
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	<!--===============================================================================================-->
</head>

<body>
	<main>
		<!--================= Start of the main =======================-->

		<!--==*** Container ECOLE 241 BUSINESS ***==-->

		<div class="container">
			<a href="#popup" class="button">Payer maintenant</a>
		</div>
		<div class="popup" id="popup">
			<div class="popup-inner">
				<div class="popup-photo"></div>
				<div class="popup-text">
					<h1>Effectuez votre paiement en toute tranquillité</h1>
					<div class="login-page">
						<div class="form">
							<form class="login-form">
								<input type="number" name="montant" placeholder="Votre montant Ex. 10 000 FCFA" />
								<button>Payer</button>
								<!-----<p class="message">Not registered? <a href="#">Create an account</a></p>---->
							</form>
						</div>
					</div>
				</div>
				<a class="popup-close" href="#"><i class="fas fa-window-close"></i></a>
			</div>
			<!--==***## End of the form ##***==-->
	</main>
	<!--================= End of the main =======================-->
	<!--================ File JS =======================-->
	<script src="<?= theme_url() ?>assets/js/popup.js"></script>
</body>

</html>