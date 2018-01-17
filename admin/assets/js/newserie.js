function manual(){
	$("#newserieapi").hide();
	$("#newseriemanual").fadeIn();
	$("#troc").html("Series - Nova Serie <b>[Modo Manual]</b>");
}

function api(){
	$("#newseriemanual").hide();
	$("#newserieapi").fadeIn();
	$("#troc").html("Series - Nova Serie <b>[Modo API]</b>");
}