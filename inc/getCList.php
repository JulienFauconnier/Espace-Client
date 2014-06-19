<?php

//
// Obtenir le Catalogue
//

$type	= $_POST["type"];
$cat	= $_POST["cat"];

include("initAPI.php");

if ($type != '' && $cat != ''){
	$request =  array(
		'method'	=> 'Catalogue.getList',
		'params'	=> array(
			'type'	=> $type,
			/*
			'pagination' => array(
				'pagenum'	=> {{pagenum}},
			),
			*/
		'search'	=> array(
			'tags' 			=> $cat
			)
		)
		);

	$resultat = sellsyConnect::load()->requestApi($request);
	$ret = $resultat->response->result;
	echo (json_encode($ret));
}

?>