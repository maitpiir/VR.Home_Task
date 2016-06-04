
function beginTeamRegistration() {
	$controller.get('index.php?page=teamRegister&get', function(result) {
		toggleOverlay(true, result );
	});
}

function toggleOverlay(open, content = '') {
	var e = document.getElementById('overlay');
	if (open) {
		e.setAttribute("status", "open");
		document.getElementById('overlay-content').innerHTML = content;
	}
	else {
		e.setAttribute("status", "closed");	
	}
}

function addTeam() {

	$controller.get('index.php?get&page=teams', function(result) {

		var teams = JSON.parse(result);
		var content = '';

		var addedTeams = document.getElementsByName('players[]');

		for (var i = 0; i < teams.length; i++) {
			if ( alreadyExists(addedTeams, teams[i].id ) ) { continue; }
			content += '<p><input type="button" value="' + teams[i].name + '" onclick="selectTeam('+ teams[i].id +', \''+ teams[i].name +'\');"/>';
		}

		toggleOverlay(true, content);
	});

}

function alreadyExists(addedTeams, id) {

	for(var i = 0; i < addedTeams.length; i++) {
		if ( id == addedTeams[i].value ) {
			return true;
		}
	}

	return false;
}

function selectTeam(id, name) {
	toggleOverlay(false);
	document.getElementById('tournamentTeams').innerHTML += '<p>' + name + '<input type="hidden" name="players[]" value="' + id + '"/>';
} 