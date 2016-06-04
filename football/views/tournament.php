<h2>Tournament</h2>

<?php

$db = new Database();

$result = $db->get( 'SELECT * FROM tournaments WHERE id='. $id .';' );

if (count($result == 1)) {
	$tournamentName = $result[0][1];
	echo '<h3>"'.$tournamentName.'"</h3>';

	$games = $db->get( 'SELECT * FROM game WHERE tournament_id=' . $result[0][0] . ';' );

	// get all the player teams
	$teams = array();
	foreach ( $games as $game ) {
		if ( !array_key_exists($game[1] . '_', $teams) ) {
			$teams = array_merge($teams,  array( $game[1] . '_' => '' ));
		}
	}

	// get teams
	$query = '';
	$i = 0;
	foreach ($teams as $key => $team) {
		$query .= 'id=' . explode('_', $key)[0];
		$i+=1;
		if ( $i < count( $teams ) ) {
			$query .= ' OR ';
		}
	}

	$res = $db->get( 'SELECT * FROM teams WHERE ' . $query . ';' );
	// match
	foreach ($teams as $key => $value) {
		$realId = explode('_', $key)[0];
		foreach ($res as $val) {
			if ( strcmp($realId, $val[0]) == 0 ) {
				$teams[$key] = new stdClass();
				$teams[$key]->name = $val[1];
				$teams[$key]->id = $val[0];
				$teams[$key]->scoredGoals = 0;
				$teams[$key]->lostGoals = 0;
				$teams[$key]->won = 0;
				$teams[$key]->lost = 0;
				$teams[$key]->tie = 0;
			}
		}
	}

	// statistics
	foreach ($games as $game) {
		$home = $teams[$game[1].'_'];
		$away = $teams[$game[2].'_'];

		$home->scoredGoals += (int)($game[3]);
		$away->scoredGoals += (int)($game[4]);
		$home->lostGoals += (int)($game[4]);
		$away->lostGoals += (int)($game[3]);

		if ( (int)($game[3]) == (int)($game[4]) ) {
			$home->tie += 1;
			$away->tie += 1;
		}
		else if ( (int)($game[3]) > (int)($game[4]) ) {
			$home->won += 1;
			$away->lost += 1;
		}
		else {
			$home->won += 1;
			$away->lost += 1;
		}
	}

	// sort by score
	$orderedTeams = $teams;

	usort($orderedTeams, function( $a, $b ) {

		if ( $a->won == $b->won ) {

			if ( $a->lost == $b->lost ) {
				$aDif = $a->scoredGoals - $a->lostGoals;
				$bDif = $b->scoredGoals - $b->lostGoals;

				return $aDif > $bDif ? -1 : 1;

			}

			return $a->lost < $b->lost ? -1 : 1;

		}

		return $a->won > $b->won ? -1 : 1;

	});

	?>
	<p><strong>Teams in the tournament</strong>
	<p>
		Total: <?= count($teams) ?>
	<p>
	<table>
		<tr>
			<th>Place</th><th>Team</th><th>Won</th><th>Lost</th><th>Tie</th><th>Scored</th><th>Scored against</th><th>Goal diference</th>
		</tr>
	<?php
	$place = 1;
	foreach ($orderedTeams as $team) {
		?>
		<tr>
			<td><b><?= $place++; ?></b></td>
			<td><a href="index.php?page=teams&id=<?= $team->id ?>"><?= $team->name ?></a></td>
			<td><?= $team->won ?></td>
			<td><?= $team->lost ?></td>
			<td><?= $team->tie ?></td>
			<td><?= $team->scoredGoals ?></td>
			<td><?= $team->lostGoals ?></td>
			<td><?= $team->scoredGoals - $team->lostGoals ?></td>
		</tr>
		<?php
	}

	?>
	</table>
	<p><strong>Games in the tournament</strong>
	<p>
		Total: <?= count($games) ?>
	<p>
	<table>
		<tr>
			<th>Game</th><th>Score</th>
		</tr>
	<?php
	foreach ($games as $game) {
		?>

		<tr>
			<td> <a href="index.php?page=teams&id=<?= $teams[$game[1].'_']->id ?>"><?= $teams[$game[1].'_']->name ?></a> vs. <a href="index.php?page=teams&id=<?= $teams[$game[2].'_']->id ?>"><?= $teams[$game[2].'_']->name ?></a> </td>
			<td><b> <?= $game[3] . ' - ' . $game[4] ?></b> </td>
		</tr>

		<?php
	}

	echo '</table>';

}

?>