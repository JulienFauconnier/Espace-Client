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
	$result = sellsyConnect::load()->requestApi($request);
	echo (json_encode($result->response->result));
}

?>