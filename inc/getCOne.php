<?php

//
// Traiter l'Objet du Catalogue
//

$id		= $_POST["id"];
$type	= $_POST["type"];
$qt		= $_POST["qt"];

include("initAPI.php");

if ($id != '' && $type != '' && $qt!= ''){
	$request =  array(
		'method'	=> 'Catalogue.getOne', 
		'params'	=> array ( 
			'type' 		=> $type,
			'id' 		=> $id,
			)
		);

	$resultat = sellsyConnect::load()->requestApi($request);
	$resultat = $resultat->response;

	$tab = array(
		'row_type'				=> 'item', //$resultat->type,
		//'row_linkedid'		=> {{catalogue_id_link}},
		'row_name'				=> $resultat->name,
		'row_notes'				=> $resultat->notes,
		'row_unit'				=> $resultat->unit,
		'row_unitAmount'		=> $resultat->unitAmount,
		'row_tax'				=> $resultat->taxrate,
		'row_taxid'				=> $resultat->taxid,
		'row_tax2id'			=> $resultat->tax2id,
		'row_qt'				=> $qt,
		//'row_isOption'			=> $resultat->,
		'row_purchaseAmount'	=> ($resultat->unitAmount * (($resultat->taxrate/100) + 1) * $qt)
		);

	//$tab = json_encode($tab);

	echo (json_encode($tab));
}

?>