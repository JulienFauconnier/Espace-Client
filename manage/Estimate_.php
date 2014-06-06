<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<meta charset="UTF-8">
<html>
<head>
<title>estimation</title>
<script src="//code.jquery.com/jquery.min.js"></script>
<script src="../js/dropdown.js"></script>
</head>
<body>
<?php

include("../class/initAPI.php");
include("Catalogue.php");
include("Documents.php");

// Insérer ici la vérification de la connexion

// Insérer ici la vérification de l'existence du client sur Sellsy
 
if($_POST['validate'] != 'ok')
{

?>

<h2>Estimation</h2>

<form name = "ajout" id = "ajout" method = "post" action = "newEstimate_.php">
<fieldset>

<label> Type: </label>
<select id = "choix_type" name = "choix_type">
    <option value="none">Sélection</option>
    <option value="item">Article</option>
    <option value="service">Service</option>
</select>

<label> Catégorie: </label>
<select id = "choix_cat" name = "choix_cat">
    <option value="none">Sélection</option>
</select>

<label> Produit: </label>
<select id = "choix_select" name = "choix_select">
    <option value="none">Sélection</option>
</select>

<label for="choix_qt">Quantité:</label>
<input id="choix_qt" type="number" value = "1" min="1" max="10" />

<!--
<a href="" onclick="gestionClic(); return false;">Ajouter</a>

<div id="resultat">&nbsp;</div>
-->

<div id="result"></div>

<div class="center">
</br><input type="submit" value="Envoyer"><input type="reset" value="Réinitialiser" ></br>
</div>
<input type="hidden" name="validate" id="validate" value="ok"/>

</fieldset>
</form>

<?php

}
else
{

//$row[0] = processObject($_POST['choix_type'], $_POST['choix_select'], 1);
//$row[1] = processObject($_POST['choix_type'], $_POST['choix_select'], 1);

//setEstimate($row);

}

?>

</body>
</html>