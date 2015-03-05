<?php
define('SERVERHOST', '');
define('USERNAME', '');
define('PASSWORD', '');
define('DBNAME', '');

$connect = new mysqli(SERVERHOST,USERNAME,PASSWORD,DBNAME) or die();
?>