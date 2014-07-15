<?php
//
// Obtenir les Devis
//
session_start();
include("initAPI.php");

$request =  array(
	'method' => 'Document.getList',
	'params' => array (
		'doctype' => 'estimate',
		'search' => array(
			'thirds'	=>	array('' => $_SESSION['id_sellsy']),
			'tags'		=>	'devis_prospect'
			)
		)
	);
$result = sellsyConnect::load()->requestApi($request);
echo (json_encode($result->response->result));
?>