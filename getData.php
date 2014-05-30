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
function getArticles(){
$request =  array( 
	'method' => 'Catalogue.getList',
	'params' => array(
		'type'	=> 'item',
		'order' => array(
			'direction'	=> {{direction}},
			'order'		=> {{order}},
		),
		'pagination' => array(
			'pagenum'	=> {{pagenum}},
		),
		'search' => array(
			'name'			=> {{name}},
			'tags' 			=> {{tags}},
			'inPos'			=> {{inPos}},
			'rateCategory'		=> {{rateCategory}},
			'useDeclination'	=> {{useDeclination}},
			'combineDecli'		=> {{combineDecli}}
		)
	)
);

return sellsyConnect::load()->requestApi($request);
}

//
// Obtenir liste des Services
//
function getServices(){
$request =  array( 
	'method' => 'Catalogue.getList',
	'params' => array(
		'type'	=> 'service',
		'order' => array(
			'direction'	=> {{direction}},
			'order'		=> {{order}},
		),
		'pagination' => array(
			'pagenum'	=> {{pagenum}},
		),
		'search' => array(
			'name'			=> {{name}},
			'tags' 			=> {{tags}},
			'inPos'			=> {{inPos}},
			'rateCategory'		=> {{rateCategory}},
			'useDeclination'	=> {{useDeclination}},
			'combineDecli'		=> {{combineDecli}}
		)
	)
);

return sellsyConnect::load()->requestApi($request);
}

?>