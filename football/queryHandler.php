<?php

if ( !empty($_GET) || !empty($_POST)) {

	$id = false;
	if ( isset($_GET['id']) && $_GET['id'] != '' && is_numeric($_GET['id']) ) {
		$id = $_GET['id'];
	}
	if ( isset($_GET['cont']) ) {
		$json = true;
		$cont = $_GET['cont'];
		if ( strcmp($cont, 'register') == 0 ) {
			include('registerTeam.php');
			header( "Location: index.php?page=teams" );
		}
		else if ( strcmp($cont, 'play') == 0 ) {
			$id = 0;
			include('play.php');
			header( "Location: index.php?page=tournaments&id=" . $id );
		}
	}

	// handle pages
	else if ( isset($_GET['page']) ) {

		$page = $_GET['page'];
		if ( strcmp($page, 'teams') == 0 ) {
			if ( $id ) {
				include('views/team.php');
			}
			else {
				include('views/teams.php');
			}
		}
		else if ( strcmp($page, 'tournaments') == 0 ) {
			if ( $id ) {
				include('views/tournament.php');
			}
			else {
				include('views/tournaments.php');
			}
		}
		else if ( strcmp($page, 'teamRegister') == 0 && isset($_GET['get']) ) {
			$json = true;
			include('views/teamRegister.php');
		}
		else {
			include('views/main.php');
		}

	}
	else {
		include('views/main.php');
	}

}
else {
	include('views/main.php');
}