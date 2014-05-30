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
	<fieldset>
		<label> Articles </label>
		<select name ="choix_article">
			<?php
			$articles = Catalogue('item');
   			foreach ($articles as $article){
   				echo '<option value="'.$article->name.'">'.$article->name.'</option>';
   			}
			?>
		</select>
		<?php
		$art = Catalogue('item');
		?>
		<br/>
		<label> Services </label>
		<select name = "choixservice">
			<?php
			$services = Catalogue('service');
   			foreach ($services as $service){
   				echo '<option value="'.$service->name.'">'.$service->name.'</option>';
   			}
			?>
		</select>
		<?php
		$ser = Catalogue('item');
		?>
		<br/>
		<div class="center">
			</br><input type="submit" value="Envoyer"><input type="reset" value="R&eacute;initialiser" ></br>
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
$name = $_POST['choix_article'];
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

sellsyConnect::load()->requestApi($request);

}

?>