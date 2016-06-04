<h2>Team</h2>
<?php

$db = new Database();

$res = $db->get( 'SELECT * FROM teams WHERE id='.$id.';' );
if ( count($res) == 1 ) {
	$team = new stdClass();
	$team->id = $res[0][0];
	$team->name = $res[0][1];

	$tournaments = $db->get( 'SELECT t.* FROM tournaments AS t JOIN team_tournament AS tt ON t.id = tt.tournament_id WHERE tt.team_id = ' . $id .';' );

?>
	
<h3>"<?= $team->name ?>"</h3>

<?php

if ( count( $tournaments ) > 0 ) {
	?>
	<b>Related Tournaments</b>
	<p>
		Total: <?= count( $tournaments ) ?>
	<p>
	<table>
		<tr>
			<th>Tournament Name</th>
		</tr>
	<?php
	foreach ($tournaments as $tournament) {
	?>
		<tr>
			<td><a href="index.php?page=tournaments&id=<?=$tournament[0]?>"><?=$tournament[1]?></a></td>
		</tr>
	<?php
	}

	echo '</table>';
	
}


}

?>