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
	$result = sellsyConnect::load()->requestApi($request);
	$result = $result->response;

	$tab = array(
		'row_type'				=> 'item',
		//'row_linkedid'		=> {{catalogue_id_link}},
		'row_name'				=> $result->tradename,
		'row_notes'				=> $result->notes,
		'row_unit'				=> $result->unit,
		'row_unitAmount'		=> $result->unitAmount,
		//'row_tax'				=> $result->taxrate,
		'row_taxid'				=> $result->taxid,
		'row_tax2id'			=> $result->tax2id,
		'row_qt'				=> $qt,
		//'row_isOption'			=> $resultat->,
		'row_purchaseAmount'	=> ($result->unitAmount * (($result->taxrate/100) + 1) * $qt)
		);
	echo (json_encode($tab));
}

?>