<?php

include("initAPI.php");
echo '<link href="getRow.css" type="text/css" rel="stylesheet">';

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

echo ($corpInfos->name);
echo '<br>';

echo '<table>';
echo '<tr>';
echo '<th>Nom</th><th>Description</th><th>Qte</th><th>Prix Unitaire HT</th><th>Total HT</th>';
echo '</tr>';

if ($row != ''){
	foreach($row as $line) {
		echo '<tr>';
		echo '<td>'.$line['row_name'].'</td><td>'.$line['row_notes'].'</td><td>'.$line['row_qt'].'</td><td>'.round($line['row_unitAmount'], 2).'</td><td>'.round($line['row_purchaseAmount'], 2).'</td>';
		echo '</tr>';
	}
}

echo '</table>';

?>