<?php

//
// Obtenir les Categories
//

include("initAPI.php");

$request = array(
	'method'	=> 'SmartTags.getList',
	'params'	=> array(
		/*
		'pagination'	=> array (
			'nbperpage'		=> {{nbperpage}},
			'pagenum'		=> {{pagenum}}
		),
		*/
	'search'		=> array (
		'category'		=> 'catalogue',
			//'inPos'			=> {{inPos}},
		'contains'		=> '_v'
		)
	)
	);
$result = sellsyConnect::load()->requestApi($request);
echo (json_encode($result->response->result));

?>