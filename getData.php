<?php

//include("initAPI.php");

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
// Obtenir liste des Articles
//
function Catalogue($type){
$request =  array(
	'method' => 'Catalogue.getList',
	'params' => array(
		'type'	=> $type,
		/*
		'pagination' => array(
			'pagenum'	=> {{pagenum}},
		),
		*/
		'search' => array(
			'tags' 			=> 'visible'
		)
	)
);

$resultat = sellsyConnect::load()->requestApi($request);
$ret = $resultat->response->result;
return $ret;
}

?>