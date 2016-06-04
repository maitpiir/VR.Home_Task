<?php

if ( isset($_POST) ) {
	if ( isset($_POST['name']) && $_POST['name'] != '' ) {
		$name = $_POST['name'];

		$db = new Database();

		$query = sprintf( "INSERT INTO teams (name) VALUES ('%s');", $name );

		$db->execute( $query );

	}
}

?>