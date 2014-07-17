<?php
//
// Obtenir l'Estimation
//
session_start();
include("initAPI.php");

if($_SESSION['id_sellsy']!=''){
	$request =  array(
		'method' => 'Prospects.getOne',
		'params' => array(
			'id'	=> $_SESSION['id_sellsy']
			)
		);
		$result = sellsyConnect::load()->requestApi($request);
		$result = $result->response;

		// $tab = array(
		// 	'third' => array(
		// 		'name'			=> {{thirdName}},
		// 		'type'			=> {{thirdType}},
		// 		'email'			=> {{thirdEmail}},
		// 		'tel'			=> {{thirdTel}},
		// 		'fax'			=> {{thirdFax}},
		// 		'mobile'		=> {{thirdMobile}},
		// 		'web'			=> {{thirdWeb}},
		// 		'siret'			=> {{thirdSiret}},
		// 		'vat'			=> {{thirdVat}},
		// 		'rcs'			=> {{thirdRcs}},
		// 		'apenaf'		=> {{thirdApenaf}},
		// 		'capital'		=> {{thirdCapital}},
		// 		'tags'			=> {{thirdTags}},
		// 		'accountingcode'=> {{thirdAccountingcode}},
		// 		'auxcode'		=> {{thirdAuxcode}},
		// 		'stickyNote'	=> {{thirdStickyNote}}
		// 		),
		// 	'contact' => array(
		// 		'name'		=> {{contactName}},
		// 		'forename'	=> {{contactForename}},
		// 		'email'		=> {{contactEmail}},
		// 		'tel'		=> {{contactTel}},
		// 		'fax'		=> {{contactFax}},
		// 		'mobile'	=> {{contactMobile}},
		// 		'position'	=> {{contactPosition}}
		// 		),
		// 	'address' => array(
		// 		'name'		=> {{addressName}},
		// 		'part1'		=> {{addressPart1}},
		// 		'part2'		=> {{addressPart2}},
		// 		'zip'		=> {{addressZip}},
		// 		'town'		=> {{addressTown}},
		// 		'countrycode'	=> {{addressCountrycode}}
		// 		)
		// 	);
// echo (json_encode($tab));
echo (json_encode($result));
}
else
	echo "";
?>