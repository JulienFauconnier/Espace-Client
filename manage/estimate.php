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

</head>
<body>

	<h2>Estimation</h2>

	<form name = "ajout" id = "ajout" method = "post" action = "estimate_.php">
		<fieldset>
			<label for = "choix_type"> Type: </label>
			<select id = "choix_type" name = "choix_type">
				<option id = "none">Sélection</option>
				<option id = "item">Article</option>
				<option id = "service">Service</option>
			</select>

			<label for = "choix_cat"> Catégorie: </label>
			<select id = "choix_cat" name = "choix_cat">
			</select>

			<label for "choix_id"> Produit: </label>
			<select id = "choix_id" name = "choix_id">
			</select>

			<label for = "choix_qt">Quantité:</label>
			<input id = "choix_qt" name = "choix_qt" type = "number" value = "1" min = "1" max = "10" />

			<button id = "addb" onclick="return false">Ajouter</button>
		</fieldset>

		<fieldset>
			<span id = "result">&nbsp;</span>
		</fieldset>

		<div class = "center">
			<input id = "submit" type = "submit" value = "Envoyer" onclick="return false">
			<!-- <input id = "reset" type = "reset" value = "Réinitialiser"> -->
		</div>

		<input type = "hidden" name = "validate" id = "validate" value = "ok"/>
	</form>

</body>
</html>