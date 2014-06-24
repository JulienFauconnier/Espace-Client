<?php

//
// Obtenir l'Estimation
//

$row	= $_POST["row"];

include("initAPI.php");

if ($row != ''){
	$request = array(
		'method'	=> 'Document.create',
		'params'	=> array(
			'document'	=> array(
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
				//'hasDoubleVat'			=> 'Y'
				),
			'row' => $row
			)
		);
	$result = sellsyConnect::load()->requestApi($request);
	echo (json_encode($result->status));
}

?>