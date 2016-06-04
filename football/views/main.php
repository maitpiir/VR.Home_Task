<h2>Start Tournament</h2>
<form action="index.php?cont=play" method="POST">
Tournament name: <input type="text" name="tournamentName" />
<div id="tournamentTeams">
		
</div>
<p>
<input type="button" value="Add Team" onclick="addTeam();"/>
<p>
<input type="submit" value="Play" />
</form>