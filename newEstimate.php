<?php

include("initAPI.php");
include("getData.php");

// Insérer ici la vérification de la connexion

// Insérer ici la vérification de l'existence du client sur Sellsy
 
if($_POST['validate'] != 'ok')
{

?>

<h2>Estimation</h2>
			
<form name="ajout" id="ajout" method="post" action="newEstimate.php">
	<fieldset><legend>Estimation</legend>
		<label> Nom </label><input type="text" name="NomE"/><br/>
		<div class="center">
			</br><input type="submit" value="Envoyer"></br>
			</br><input type="reset" value="R&eacute;initialiser" ></br>
		</div>
		<input type="hidden" name="validate" id="validate" value="ok"/>
	</fieldset>
</form>

<?php
}
else
{

$request = array(
		'method' => 'Document.create',
		'params' => Array (
			'document' 		=> Array (
				'doctype'		=> 'estimate',								// Valeur "estimate"
				'thirdid'		=> '1452907',							// Ici utiliser $_SESSION[idsellsy] ?
				//'tags'		=> 'espace_client'						    // facultatif, utile pour trier les devis réalisés par les clients et ceux réalisés en interne
			),
			'row' => Array (
				'1' => Array (
					'row_type'		=> 'item',
					'row_unit'		=> "unité",
					'row_unitAmount'	=> '500',
					'row_tax'		=> '10',
					'row_purchaseAmount'	=> '550'
				),
				'2' => Array (
					'row_type'		=> 'item',
					'row_unit'		=> "unité",
					'row_unitAmount'	=> '500',
					'row_tax'		=> '10',
					'row_purchaseAmount'	=> '550'
				)
			)
		)
	);

$res = sellsyConnect::load()->requestApi($request);
echo $res->response->doc_id;
echo $res->response->status;

}

?>