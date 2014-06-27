<?php

include("initAPI.php");

function getCorpInfos(){
	$request =  array(
		'method' => 'AccountPrefs.getCorpInfos',
		'params' => array()
		);
	$result = sellsyConnect::load()->requestApi($request);
	return ($result->response);
}

$corpInfos = getCorpInfos();
$row	= $_POST["row"];
$Total	= 0;

echo $corpInfos->name;
echo '<br><br><br>';
echo '<table>';
echo '<tbody>';
echo '<tr><th width="15%">Nom</th><th width="40%" class = "hide-for-small-only">Description</th><th width="10%">Qte</th><th width="15%">PU HT</th><th width="20%">Total HT</th></tr>';
if ($row != '')
	foreach($row as $line) {
		echo '<tr><td>'.$line['row_name'].'</td><td class = "hide-for-small-only">'.$line['row_notes'].'</td><td>'.$line['row_qt'].'</td><td>'.round($line['row_unitAmount'], 2).'</td><td class="price">'.round($line['row_purchaseAmount'], 2).'</td></tr>';
		$Total += $line['row_purchaseAmount'];
	}
echo '</tbody>';
echo '</table>';
echo '<br>Total Net HT: '.$Total;
echo '<br>TVA 8.5: '.($Total*0.085);
echo '<br>Montant Total TTC: '.($Total+($Total*0.085));

?>