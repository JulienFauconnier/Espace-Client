<?php

//
// Obtenir les Categories
//
function getCategories(){
$request = array(
	'method' => 'SmartTags.getList',
	'params' => array(
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
return $ret;
}

//
// Obtenir le Catalogue
//
function getCatalogue($type, $cat){
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
			'tags' 			=> $cat
		)
	)
);

$resultat = sellsyConnect::load()->requestApi($request);
$ret = $resultat->response->result;
return $ret;
}

//
// Traiter l'Objet du Catalogue
//
function processObject($type, $id, $qt){
$request =  array( 
	'method' => 'Catalogue.getOne', 
	'params' => array ( 
		'type' 		=> $type,
		'id' 		=> $id,
	)
);

$resultat = sellsyConnect::load()->requestApi($request);
$resultat = $resultat->response;

$tab = array(
	'row_type'				=> 'item', //$resultat->type,
	//'row_linkedid'		=> {{catalogue_id_link}},
	'row_name'				=> $resultat->name,
	'row_notes'				=> $resultat->notes,
	'row_unit'				=> $resultat->unit,
	'row_unitAmount'		=> $resultat->unitAmount,
	'row_tax'				=> $resultat->taxrate,
	'row_taxid'				=> $resultat->taxid,
	'row_tax2id'			=> $resultat->tax2id,
	'row_qt'				=> $qt,
	//'row_isOption'			=> $resultat->,
	'row_purchaseAmount'	=> ($resultat->unitAmount * (($resultat->taxrate/100) + 1) * $qt)
);

//$tab = json_encode($tab);

return $tab;
}

?>