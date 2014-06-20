<?php
/*
 * init api
 */
require_once('sellsyconnect.php');
require_once('sellsytools.php');

sellsyTools::storageSet('oauth_token', 'aa1cbaf0997acc89ac67976642384a8f9407be1e');
sellsyTools::storageSet('oauth_token_secret', 'd4102e10355b8c65522fede0602c6626541dbd1e');
sellsyTools::storageSet('step', 'accessApi');

/*
 * check if the user is logged
 */
sellsyConnect::load()->checkApi();
?>