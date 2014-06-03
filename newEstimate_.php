<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>Estimation</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    var $choix_categorie = $('#choix_categorie');
    var $choix_select = $('#choix_select');
     
    // chargement des catégories
    $.ajax({
        url: 'getMore.php',
        data: 'go', // on envoie $_GET['go']
        dataType: 'json', // on veut un retour JSON
        success: function(json){
            $.each(json, function(index, value){ // pour chaque noeud JSON
                // on ajoute l option dans la liste
                $choix_categorie.append('<option value="'+ index +'">'+ value +'</option>');
            });
        }
    });
 
    // à la sélection d une catégorie dans la liste
    $choix_categorie.on('change', function() {
    	var val1 = choix_type;
        var val2 = $(this).val(); // on récupère la valeur de la catégorie
 
        if (val != ''){
            $choix_select.empty(); // on vide la liste des "produits"
             
            $.ajax({
                url: 'getMore.php',
                data: 'id_type='+ val1'&id_categorie='+ val2, // on envoie $_GET['id_categorie']
                dataType: 'json',
                success: function(json){
                    $.each(json, function(index, value){
                        $choix_select.append('<option value="'+ index +'">'+ value +'</option>');
                    });
                }
            });
        }
    });
});
</script>
</head>
<body>
<?php

include("initAPI.php");
include("getData.php");
include("setData.php");
//include("getMore.php");

// Insérer ici la vérification de la connexion

// Insérer ici la vérification de l'existence du client sur Sellsy
 
if($_POST['validate'] != 'ok')
{

?>

<h2>Estimation</h2>

<form name = "ajout" id = "ajout" method = "post" action = "newEstimate.php">
<fieldset>

<label> Type: </label>
<select id = "choix_type" name = "choix_type">
<option value="none">Selection</option>
<option value="item">Article</option>
<option value="service">Service</option>
</select>

<label> Categorie: </label>
<select id = "choix_categorie" name = "choix_categorie"></select>

<label> Produit: </label>
<select id = "choix_select" name = "choix_select"></select>

<label for="intNumber">Quantite:</label>
<input id="intNumber" type="number" min="1" max="10" />

<a href="" onclick="gestionClic(); return false;">Ajouter</a>

<!-- <div id="resultat">&nbsp;</div> -->

<div class="center">
</br><input type="submit" value="Envoyer"><input type="reset" value="R&eacute;initialiser" ></br>
</div>
<input type="hidden" name="validate" id="validate" value="ok"/>

</fieldset>
</form>

<?php

}
else
{

$row[0] = processObject($_POST['choix_type'], $_POST['choix_select'], 1);
$row[1] = processObject($_POST['choix_type'], $_POST['choix_select'], 1);

//setEstimate($row);

}

?>
</body>
</html>