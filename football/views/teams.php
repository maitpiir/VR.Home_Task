<?php

$db = new Database();

$res = $db->get('SELECT * FROM teams;');

$teams = [];
foreach ($res as $r) {
	$temp = new stdClass();
	$temp->id = $r[0];
	$temp->name = $r[1];
	$teams[] = $temp;
}


if ( isset($_GET['get']) ) {
	echo json_encode( $teams );
	$json = true;
}
else {

?>

<h2>Teams</h2>
<p>
<input type="button" onclick="beginTeamRegistration();" value="Register New Team"/>
<p>
<table>

	<?php

	if ( count($teams) > 0 ) {
		foreach ($teams as $team) {
		?>
		<tr>
			<td>
			<a href="index.php?page=teams&id=<?=$team->id?>"><?=$team->name?></a>
			</td>
		</tr>

		<?php
		}
	}
	else {
		echo "<b>Võistkondi ei leitud.</b>";
	}

	?>

</table>

<?php } ?>