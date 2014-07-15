<?php
//
// Obtenir les Categories
//

include("initAPI.php");
$request = array(
	'method'	=> 'SmartTags.getList',
	'params'	=> array(
		'search'		=> array (
			'category'		=> 'catalogue',
			'contains'		=> '_v'
			)
		)
	);
$result = sellsyConnect::load()->requestApi($request);
echo (json_encode($result->response->result));
?>