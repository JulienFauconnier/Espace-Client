<?php

include("initAPI.php");

// Insérer ici la vérification de la connexion

$request = array(
		'method' => Document.create,
		'params' => Array (
			'document' => Array (
				'doctype'		=> {{doctype}},								// Valeur "estimate"
				'parentId'		=> {{parentId}},							// Facultatif -> Exemple : Pour facturer un devis, créer une nouvelle facture en précisant l'identifiant du devis à facturer en parentId
				'thirdid'		=> {{clientid}},							// Ici utiliser une variable dont la valeur provient d'un get pour obtenir l'id associé au client connecté  (via $_SESSION[id])
				'displayedDate'		=> {{displayedDate}},					// date du jour ?
				'subject'		=> {{document_subject}},					// facultatif
				'notes'			=> {{document_notes}},						// facultatif
				'tags'			=> {{document_tags}},						// facultatif, utile pour trier les devis réalisés par les clients et ceux réalisés en interne
				'displayShipAddress'	=> {{displayshippaddress_enum}},    // Ici utiliser une variable dont la valeur provient d'un get pour obtenir du client client connecté  (via $_SESSION[id])
				'rateCategory'		=> {{rateCategory}},
				'globalDiscount'	=> {{globalDiscount}},
				'globalDiscountUnit'=> {{globalDiscountUnit}},
				'hasDoubleVat'		=> {{hasDoubleVat}}
			),
			'thirdaddress' => array(
				'id' => {{thirdaddress_id}}
			),
			'shipaddress' => array(
				'id' => {{shipaddress_id}}
			),
			'row' => Array (
				'1' => Array (
					'row_type'		=> 'packaging',
					'row_packaging'		=> {{packagin_name}},
					'row_name'		=> {{row_name}},
					'row_unitAmount'	=> {{row_unit_amount}},
					'row_tax'		=> {{row_taxrate}},
					'row_taxid'		=> {{row_taxid}},
					'row_tax2id'		=> {{row_tax2id}},
					'row_qt'		=> {{row_quantity}},
					'row_isOption'		=> {{row_option}}
				),
				'2' => Array (
					'row_type'		=> 'item',
					'row_shipping'		=> {{shipping_name}},
					'row_name'		=> {{row_name}},
					'row_unitAmount'	=> {{row_unit_amount}},
					'row_tax'		=> {{row_taxrate}},
					'row_taxid'		=> {{row_taxid}},
					'row_tax2id'		=> {{row_tax2id}},
					'row_qt'		=> {{row_quantity}},
					'row_isOption'		=> {{row_option}}
				),
			)
		)
	);
 
sellsyConnect::load()->requestApi($request);

?>