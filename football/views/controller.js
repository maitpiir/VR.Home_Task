var Controller = function (){

	this.get = function (request, doneFunction) {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
				doneFunction(xhttp.responseText);				
			}
		};
		xhttp.open("GET", request, true);
		xhttp.send();
	};
	
	this.post = function(request, data, doneFunction) {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
				doneFunction(xhttp.responseText);				
			}
		};
		xhttp.open("POST", request, true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send(data);
	}

};

$controller = new Controller();