<?php

//
// Obtenir l'Estimation
//
function setEstimate($row){

// Début
$request = array(
	'method' => 'Document.create',
	'params' => array(
		'document' 	=> array(
			'doctype'				=> 'estimate',
			//'parentId'				=> {{parentId}},
			'thirdid'				=> '1470593',
			//'displayedDate'			=> {{displayedDate}},
			//'subject'				=> {{document_subject}},
			//'notes'					=> {{document_notes}},
			'tags'					=> 'devis_prospect'
			//'displayShipAddress'	=> {{displayshippaddress_enum}},
			//'rateCategory'			=> {{rateCategory}},
			//'globalDiscount'		=> {{globalDiscount}},
			//'globalDiscountUnit'	=> {{globalDiscountUnit}},
			//'hasDoubleVat'		=> {{hasDoubleVat}}
		),
		'row' => $row
	)
);

sellsyConnect::load()->requestApi($request);
}

?>