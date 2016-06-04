<?php

if ( isset($_POST['players']) ) {

$players = $_POST['players'];
$name = $_POST['tournamentName'];

// create new tournament
$db = new Database();

$tournament_id = $db->create( 'INSERT INTO tournaments (name) VALUES("'. $name .'")' );

if ( $tournament_id != 0 ) {
	// compete
	foreach ($players as $home) {

		$db->create( 'INSERT INTO team_tournament (team_id, tournament_id) VALUES('.(int)$home.', '. $tournament_id .');' );

		foreach ($players as $away) {
			if (  strcmp( $home ,$away) == 0 ) { continue; }

			// play game
			$homeScore = rand(0,9);
			$awayScore = rand(0,9);

			$query = sprintf('INSERT INTO game (home_team_id, away_team_id, homeScore, awayScore, tournament_id) VALUES(%s, %s, %u, %u, %u);', $home, $away,$homeScore, $awayScore, $tournament_id );

			$db->create($query);

		}
	}

	$id = $tournament_id;

}

}

?>