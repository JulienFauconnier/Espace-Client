<?php
//
// Obtenir le Catalogue
//

include("initAPI.php");

$type	= $_POST["type"];
$cat	= $_POST["cat"];

if ($type != '' && $cat != ''){
	$request =  array(
		'method'	=> 'Catalogue.getList',
		'params'	=> array(
			'type'	=> $type,
			'search'	=> array(
				'tags' 			=> $cat
				)
			)
		);
	$result = sellsyConnect::load()->requestApi($request);
	echo (json_encode($result->response->result));
}
?>