<?php

include("initAPI.php");
include("getData.php");

// Insérer ici la vérification de la connexion

// Insérer ici la vérification de l'existence du client sur Sellsy
 
if($_POST['validate'] != 'ok')
{

?>

<h2>Estimation</h2>
			
<form name="ajout" id="ajout" method="post" action="newEstimate.php">
	<fieldset><legend>Estimation</legend>
		<label> Nom </label><input type="text" name="NomE"/><br/>
		<div class="center">
			</br><input type="submit" value="Envoyer"></br>
			</br><input type="reset" value="R&eacute;initialiser" ></br>
		</div>
		<input type="hidden" name="validate" id="validate" value="ok"/>
	</fieldset>
</form>

<?php

}
else
{

$type = 'item';
$linked = '1707689';
$name = 'test';
$note = 'blablabla';
$unit = 'unité';
$unitA = '550';
$tax = '8.5';
$qt = '2';
$pA = $unitA * $qt * (($tax / 100) + 1); 

$request = array(
	'method' => 'Document.create',
	'params' => array(
		'document' 	=> array(
			'doctype'				=> 'estimate',
			'thirdid'				=> '1470593'
			//'displayedDate'			=> {{displayedDate}},
			//'subject'				=> {{document_subject}},
			//'notes'					=> {{document_notes}},
			//'tags'					=> {{document_tags}},
			//'displayShipAddress'	=> {{displayshippaddress_enum}},
			//'rateCategory'			=> {{rateCategory}},
			//'globalDiscount'		=> {{globalDiscount}},
			//'globalDiscountUnit'	=> {{globalDiscountUnit}},
			//'hasDoubleVat'		=> {{hasDoubleVat}}
		),
		'row' => array(
			'1' => array(
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
			)
		)
	)
);

echo sellsyConnect::load()->requestApi($request);

}

?>