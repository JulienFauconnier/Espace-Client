<?php
    if (isset($_GET['js_var'])) $php_var = $_GET['js_var'];
    else $php_var = "<br />js_var is not set!";
 
    echo $php_var;
?>