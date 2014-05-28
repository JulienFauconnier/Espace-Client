<?php
/*
 * init api
 */
require_once('class/sellsyconnect.php');
require_once('class/sellsytools.php');
 
sellsyTools::storageSet('oauth_token', '{{token_utilisateur}}');
sellsyTools::storageSet('oauth_token_secret', '{{secret_utilisateur}}');
sellsyTools::storageSet('step', '{{step}}');
 
/*
 * check if the user is logged
 */
sellsyConnect::load()->checkApi();
?>