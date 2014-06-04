<?php

include("initAPI.php");
include("getData.php");
include("setData.php");

header("Content-Type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
echo "<list>";

$cat = (isset($_POST["categorie"])) ? htmlentities($_POST["categorie"]) : NULL;

if ($cat) {
    $services = getCatalogue('item', $cat);
    foreach ($catalogue as $select){
        echo "<item id=\"" . $select->id . "\" name=\"" . $select->name . "\" />";
    }
}

echo "</list>";

?>