<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
	<div class = "row">
		<form>
				<fieldset>
					<legend>Paramètres</legend>
					<div class = "medium-2 large-2 columns">
						<label for = "choix_type">Type:
							<select id = "choix_type" name = "choix_type">
								<option id = "none">Choisir un Type</option>
								<option id = "item">Produit</option>
								<option id = "service">Service</option>
							</select>
						</label>
					</div>
					<div class = "medium-3 large-3 columns">
						<label for = "choix_cat">Catégorie:
							<select id = "choix_cat" name = "choix_cat">
							</select>
						</label>
					</div>
					<div class = "medium-3 large-3 columns">
						<label for "choix_id">Prestation:
							<select id = "choix_id" name = "choix_id">
							</select>
						</label>
					</div>
					<div class = "medium-2 large-2 columns">
						<label for = "choix_qt">Quantité:
							<input id = "choix_qt" name = "choix_qt" type = "number" value = "1" min = "1" max = "10"/>
						</label>
					</div>
					<div class = "medium-2 large-2 columns">
						<button class = "expand radius" type = "button" id = "addb">Ajouter</button>
					</div>
				</fieldset>
				<fieldset>
					<legend>Aperçu</legend>
					<table class = "columns">
						<thead>
							<tr><th width="15%">Nom</th><th width="40%" class = "hide-for-small-only">Description</th><th width="10%">Qte</th><th width="15%">PU HT</th><th width="15%">Total HT</th><th width="5%"></th></tr>
						</thead>
						<tbody id ="result">&nbsp;</tbody>
					</table>
				</fieldset>
				<div class = "medium-2 medium-push-4 large-2 large-push-4 columns text-right">
					<button class = "expand radius" type = "button" id = "submit">Valider</button>
				</div>
				<div class = "medium-2 medium-pull-4 large-2 large-pull-4 large columns text-left">
					<button class = "expand radius" type = "button" id = "reset">Réinitialiser</button>
				</div>
		</form>
	</div>
</body>
</html>