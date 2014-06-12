<?php
$type	= $_POST["c_type"];
$cat	= $_POST["c_cat"];

if ($type != '' && $cat != ''){
	$produ* = getCatalogue($type, $cat);
	foreach ($products as $product){
		echo '<option value="'.$product->id.'">'.$product->name.'</option>';
	}
}

?>