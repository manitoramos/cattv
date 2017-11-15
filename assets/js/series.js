function Iframeopenload(url,stuff) {
	//var url = document.getElementById("openload").value;
	//alert(url);
	//titulo,episodios,season,pontuacao
	var str = stuff;
	var res = str.split("/");
	
    var $iframe = $('#frameserie');
		if ( $iframe.length ) {
			$iframe.attr('src',url);
			$('#snip').text(document.getElementById("sinopse").value);
			document.title = "Supernatural - " + document.getElementById("epname").value;//mudar o titulo da pagina
			$('#temepname').text("Temporada " + res[2] + " Episodio " + res[1] + " - " + res[0]);
			$('#pontep').text(res[3]);
			return false;
		}
		return true;
	}
	function Iframestreamango(url,stuff){
	//var url = document.getElementById('streamango').value;
	//alert(url);
	var str = stuff;
	var res = str.split("/");
	
    var $iframe = $('#frameserie');
		if ( $iframe.length ) {
			$iframe.attr('src',url);
			$('#snip').text(document.getElementById("sinopse").value);
			document.title = "Supernatural - " + document.getElementById("epname").value;//mudar o titulo da pagina
			$('#temepname').text("Temporada " + res[2] + " Episodio " + res[1] + " - " + res[0]);
			$('#pontep').text(res[3]);
			return false;
		}
		return true;
	}
	
	//escolher server para ver ep
	function escserver(sku,titulo){
		document.getElementById(titulo+"2").style.backgroundColor = "rgba(153, 0, 204,0.4)";
		
			if(titulo == document.getElementById('epname').value)
			{
			}
			else if(document.getElementById('epname').value != "" && titulo != document.getElementById('epname').value)
			{
				document.getElementById('servers').style.display = "none";
				//document.getElementById('servers2').style.display = "inline";
				var tirarbg = document.getElementById('epname').value;
				if(document.getElementById(tirarbg+"2") == null){
				}
				else{
				document.getElementById(tirarbg+"2").style.backgroundColor = "";}
			}
			
				
			/*$.ajax({
			   type: "POST",
			   url: "assets/php/valses.php",
			   data: "id=" + sku
			});
			
			setInterval({
				$( "#servers" ).load( "series.php #servers", function() {
					document.getElementById('servers2').style.display = "none";
					$("#servers").fadeIn();
					$("#servers").attr("class", "");
				});
			},1000);*/
			  //$("#servers").removeClass("col-md-12");
			var http = new XMLHttpRequest();
		
			var parametros = "id=" + sku;
			
			http.open("POST", "../assets/php/valses.php", true);
			
			http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

			http.onreadystatechange = function() {
				if(http.readyState == 4 && http.status == 200) 
				{
					var url = window.location.href.toString();
					
					var str = url;
					var res = str.split("/");
					
					var str = res[5];
					var res = str.split("#");
					
					$( "#servers" ).load( "../series/"+res[0]+" #servers", function() {
						//document.getElementById('servers2').style.display = "none";
						$("#servers").fadeIn();
						$("#servers").attr("class", "");
					});
					//console.log(http.responseText);
					//console.log(res[0]);
					
				}
			}
			http.send(parametros);
		}
	
	//ao clicar na cruz para fechar as abas dos servers
	function noneserver(){
		document.getElementById('servers').style.display = "none";
		//document.getElementById('servers2').style.display = "inline";
		var tirarbg = document.getElementById('epname').value;
		//document.getElementById(tirarbg+"2").style.backgroundColor = "";//nome do titulo + id com o(2) para nao confundiar com outros
	}
	
	//on focus e on blur escolher episodios
	/*$('a').focus(
    function(){
        $(this).parent('div').css('backgroundColor','rgba(153, 0, 204,0.4)');
		//$(this).parent('div').css('opacity','0.3');
    }).blur(
    function(){
        //$(this).parent('div').css('backgroundColor','');
		//$(this).parent('div').css('opacity','');
    });
	
	//hover e quando perde o hover escolher episodios
	$("a").hover(
    function () {
        $(this).parent('div').css('backgroundColor','#9900cc');
		$(this).parent('div').css('opacity','0.3');
    },
    function () {
        $(this).parent('div').css('backgroundColor','#1d1d1d');
		$(this).parent('div').css('opacity','1');
    }
	);*/
	
	//mudar o valor da session
	function valses(){
	}
	
	
	function t_season(season){
		
		var http = new XMLHttpRequest();
		
			var parametros = "season=" + season;
			
			http.open("POST", "../assets/php/tseason.php", true);
			
			http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

			http.onreadystatechange = function() {
				if(http.readyState == 4 && http.status == 200) 
				{
					
					var url = window.location.href.toString();
					
					var str = url;
					var res = str.split("/");
					
					var str = res[5];
					var res = str.split("#");
					
					$( "#seasons" ).load( "../series/"+res[0]+" #seasons", function() {
						//document.getElementById('servers2').style.display = "none";
						document.getElementById('epname').value = "";
					});
					
					
					
					//console.log(res[0]);
					
				}
			}
			http.send(parametros);
		
	}