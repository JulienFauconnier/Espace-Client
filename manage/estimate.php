<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<meta charset = "UTF-8">
<html>
<head>
	<title>Estimation</title>

	<!-- Insérer ici la vérification de la connexion -->

	<?php
	include("../inc/initAPI.php");
	?>

	<!-- Insérer ici la vérification de l'existence du client sur Sellsy -->

	<script src = "//code.jquery.com/jquery.js"></script>

	<?php
	include("../inc/dropdown.php");
	?>

	<link rel="stylesheet" href="../css/foundation.css?<?php echo rand();?>" />

</head>
<body>

	<div class="row">
		<form name = "ajout" id = "ajout" method = "post" action = "estimate.php">
			<fieldset>
				<legend>Paramètres</legend>
				<div class="medium-2 large-2 columns">
					<label for = "choix_type"> Type:
						<select id = "choix_type" name = "choix_type">
							<option id = "none">Sélection</option>
							<option id = "item">Article</option>
							<option id = "service">Service</option>
						</select>
					</label>
				</div>

				<div class="medium-2 large-2 columns">
					<label for = "choix_cat"> Catégorie:
						<select id = "choix_cat" name = "choix_cat">
						</select>
					</label>
				</div>

				<div class="medium-2 large-2 columns">
					<label for "choix_id"> Produit:
						<select id = "choix_id" name = "choix_id">
						</select>
					</label>
				</div>

				<div class="medium-2 large-2 columns">
					<label for = "choix_qt">Quantité:
						<input id = "choix_qt" name = "choix_qt" type = "number" value = "1" min = "1" max = "10" />
					</label>
				</div>

				<div class="medium-2 large-2 columns">
					<button id = "addb" onclick="return false">Ajouter</button>
				</div>
			</fieldset>

			<fieldset>
				<legend>Aperçu</legend>
				<div class = "columns" id = "result">&nbsp;<div>
			</fieldset>

			<div class="medium-2 medium-push-4 large-2 large-push-4 columns text-right">
				<button class = "expand" id = "submit" onclick="return false">Valider</button>
			</div>
			<div class="medium-2 medium-pull-4 large-2 large-pull-4 large columns text-left">
				<button class = "expand" id = "reset" onclick="return false">Réinitialiser</button>
			</div>
		</form>
	</div>
</body>
</html>