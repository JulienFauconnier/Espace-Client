<?php
//
// Obtenir l'Estimation
//
session_start();
include("initAPI.php");

$params = $_POST["params"];

if ($params != ''){
	if($_SESSION['id_sellsy']==''){
		$method = 'Prospects.create';
	}
	else{
		$method = 'Prospects.update';
	}

	$request = array(
		'method' => $method,
		'params' => $params
		);
	$result = sellsyConnect::load()->requestApi($request);
	if ($method == 'Prospects.create'){
		// Stockage de la variable dans la BDD
		sql_insertq('spip_sellsy', array('id_auteur'=>'#SESSION{id_auteur}', 'id_sellsy'=>$result->response));
	}
	echo (json_encode($result));
}
else
	echo ("tttttt");
?>