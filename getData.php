<?php

include("initAPI.php");

// Insérer ici la vérification de la connexion

/*
//
// Obtenir l'adresse du client connecté
//
function getAddressID($_SESSION[id]) {

$request = array(
	'method' => 'Client.getOne',
	'params' => array( 
		'clientid'	=>  $_SESSION[clientid] 
	)
);
 
$client = sellsyConnect::load()->requestApi($request);
return $client->response->corporation->mainaddressid;
}
*/

//
// Obtenir produit du client connecté
//
function produit() {

$request =  array( 
	'method' => 'Catalogue.getOne', 
	'params' => array ( 
		'type' 		=> 'item',
		'id' 		=> '1707689'
	)
);
 
$client = sellsyConnect::load()->requestApi($request);
return $client->response;
}

?>