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
			
<form name="ajout" id="ajout" method="post" action="newEstimate.php">
	<fieldset>
		<label> Articles </label>
		<select name ="choix_article">
			<?php
			$articles = getCatalogue('item');
   			foreach ($articles as $article){
   				echo '<option value="'.$article->id.'">'.$article->name.'</option>';
   			}
			?>
		</select>
		<br/>
		<label> Services </label>
		<select name = "choix_service">
			<?php
			$services = getCatalogue('service');
   			foreach ($services as $service){
   				echo '<option value="'.$service->id.'">'.$service->name.'</option>';
   			}
			?>
		</select>
		<br/>
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

$row[0] = processObject('item', $_POST['choix_article'], 1);
$row[1] = processObject('service', $_POST['choix_service'], 1);

setEstimate($row);

}

?>