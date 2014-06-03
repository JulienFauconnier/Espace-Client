<?php
if(isset($_GET['go']) || (isset($_GET['id_type']) && (isset($_GET['id_categorie'])) {
 
    $json = array();
     
    if(isset($_GET['go'])){
        $categories = getCategories();
			foreach ($categories as $categorie){
                $json['id'][] = $categorie->id;
                $json['name'][] = $categorie->name;
			}
		}
    else if(isset($_GET['id_type']) && isset($_GET['id_categorie'])){
        $type = htmlentities(intval($_GET['id_type']));
        $cat = htmlentities(intval($_GET['id_categorie']));

        $services = getCatalogue($type, $cat);
			foreach ($catalogue as $select){
                $json['id'][] = $select->id;
                $json['name'][] = $select->name;
            }
		}

    // envoi du résultat au success
    echo json_encode($json);
}
?>