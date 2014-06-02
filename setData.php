<?php

//
// Obtenir l'Estimation
//
function setEstimate($row){

// Variables pour le test
$type = 'item';
$name = 'test';
$note = 'blablabla';
$unit = 'unité';
$unitA = '550';
$tax = '8.5';
$qt = '2';
$pA = $unitA * $qt * (($tax / 100) + 1);

//affichage de test
print_r($row);
print_r($row[1]);

// Début
$request = array(
	'method' => 'Document.create',
	'params' => array(
		'document' 	=> array(
			'doctype'				=> 'estimate',
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
		'row' => array(
			'0' => array(
				'row_type'				=> 'item',
				//'row_linkedid'		=> {{catalogue_id_link}},
				'row_name'				=> $name,
				'row_notes'				=> $note,
				'row_unit'				=> $unit,
				'row_unitAmount'		=> $unitA,
				'row_tax'				=> $tax,
				//'row_taxid'			=> {{row_taxid}},
				//'row_tax2id'			=> {{row_tax2id}},
				'row_qt'				=> $qt,
				//'row_isOption'		=> {{row_option}},
				'row_purchaseAmount'	=> $pA
			),
			'1' => $row[1]
		)
	)
);

sellsyConnect::load()->requestApi($request);
}

?>