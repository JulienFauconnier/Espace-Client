<?php
//
// Obtenir le Lien du Devis
//

include("initAPI.php");

$docid	= $_POST["docid"];

if ($docid != ''){
	$request = array(
		'method' => 'Document.getPublicLink',
		'params' => array(
			'doctype'	=> 'estimate',
			'docid'	=> $docid
		)
	);
	$result = sellsyConnect::load()->requestApi($request);
	echo (json_encode($result->response));
}
?>