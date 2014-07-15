<?php
//
// Obtenir l'Estimation
//
session_start();
include("initAPI.php");

$subject = $_POST["subject"];
$row = $_POST["row"];

if ($row != ''){
	$request = array(
		'method'	=> 'Document.create',
		'params'	=> array(
			'document'	=> array(
				'doctype'				=> 'estimate',
				//'parentId'				=> {{parentId}},
				'thirdid'				=> $_SESSION['id_sellsy'],
				//'displayedDate'			=> {{displayedDate}},
				'subject'				=> '$subject',
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