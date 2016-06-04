<h2>Tournaments</h2>
<p>
<input type="button" value="Start Tournament" onclick="window.location = 'index.php';" />
<p>
<table>
	<tr>
		<th>Tournament name</th>
	</tr>
<?php
	$db = new Database();

	$tournaments = $db->get( 'SELECT * FROM tournaments;' );
	foreach ($tournaments as $tournament) {
		?>

		<tr>
			
			<td><a href="index.php?page=tournaments&id=<?= $tournament[0] ?>"><?= $tournament[1] ?></a></td>

		</tr>

		<?php
	}
?>
</table>