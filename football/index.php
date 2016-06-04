<?php

$json = false;

$title = 'Football';

ob_start();
require_once('config.php');
require_once('database.php');
require_once('queryHandler.php');

$contents = ob_get_contents();
ob_end_clean();

if ( $json ) {
	echo $contents;
}
else {
	include('views/header.php');
	echo $contents;
	include('views/footer.php');
}

?>