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

$resultat = sellsyConnect::load()->requestApi($request);
$ret = $resultat->response->result;
echo (json_encode($ret));

?>