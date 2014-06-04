<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>Estimation</title>
<script type="text/javascript" src="oXHR.js"></script>
<script type="text/javascript">
<!-- 

function request(oSelect) {
    var xhr   = getXMLHttpRequest();
    var value = oSelect.options[oSelect.selectedIndex].value;
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            readData(xhr.responseXML);
            document.getElementById("loader").style.display = "none";
        } else if (xhr.readyState < 4) {
            document.getElementById("loader").style.display = "inline";
        }
    };
    
    xhr.open("POST", "getMore.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("categorie=" + value);
}

function readData(oData) {
    var nodes   = oData.getElementsByTagName("item");
    var oSelect = document.getElementById("choix_select");
    var oOption, oInner;
    
    oSelect.innerHTML = "";
    for (var i=0, c=nodes.length; i<c; i++) {
        oOption = document.createElement("option");
        oInner  = document.createTextNode(nodes[i].getAttribute("name"));
        oOption.value = nodes[i].getAttribute("id");
        
        oOption.appendChild(oInner);
        oSelect.appendChild(oOption);
    }
}
//-->
</script>
</head>
<body>
<?php

include("initAPI.php");
include("getData.php");
include("setData.php");

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
<select id = "choix_categorie" name = "choix_categorie" onchange="request(this.value);">
<option value="none">Selection</option>
<?php
$categories = getCategories();
foreach ($categories as $categorie){
    echo '<option value="'.$categorie->word.'">'.rtrim($categorie->word, '_v').'</option>';
}
?>
</select>

<label> Produit: </label>
<select id = "choix_select"></select>

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