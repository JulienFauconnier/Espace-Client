<?php

function infoThird($third)
{
	return ($third);
}

function infoContact($contact)
{
	return ($contact);
}

function infoAddress($contact)
{
	return ($address);
}

function createProspect($third, $contact, $address)
{

$request = array(
	'method'	=> 'Prospects.create',
	'params'	=> array(
		'third' => $third,
		'contact'	=> $contact,
		'address'	=> $address
	)
);
 
$retour = sellsyConnect::load()->requestApi($request);
$retour = $retour->response->status;

if($retour == "success")
	return ("index.php");
else
	return ("error.php");
}

function updateProspect($id, $third, $contact, $address)
{

$request = array(
	'method'	=> 'Prospects.update',
	'params'	=> array(
		'id'		=> $id,
		'third' 	=> $third,
		'contact' 	=> $contact,
		'address' 	=> $address
	)
);
 
$retour = sellsyConnect::load()->requestApi($request);
$retour = $retour->response->status;

if($retour == "success")
	return ("index.php");
else
	return ("error.php");
}

?>