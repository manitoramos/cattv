function Iframeopenload() {
	var url = document.getElementById("openload").value;
	//alert(url);
    var $iframe = $('#frameserie');
		if ( $iframe.length ) {
			$iframe.attr('src',url);   
			return false;
		}
		return true;
	}
	function Iframestreamango(){
	var url = document.getElementById('streamango').value;
	//alert(url);
    var $iframe = $('#frameserie');
		if ( $iframe.length ) {
			$iframe.attr('src',url);   
			return false;
		}
		return true;
	}
	
	//escolher server para ver ep
	function escserver(sku){	
		if(document.getElementById('epname').value != "")
		{
			document.getElementById('servers').style.display = "none";
			document.getElementById('servers2').style.display = "inline";
			var tirarbg = document.getElementById('epname').value;
			document.getElementById(tirarbg+"2").style.backgroundColor = "";
		}
			
		$.ajax({
		   type: "POST",
		   url: "assets/php/valses.php",
		   data: "id=" + sku
		});
		
		$( "#servers" ).load( "series.php #servers", function() {
			document.getElementById('servers2').style.display = "none";
			$("#servers").fadeIn();
			$("#servers").attr("class", "");
		});
		 
		  //$("#servers").removeClass("col-md-12");
	}
	
	//ao clicar na cruz para fechar as abas dos servers
	function noneserver(){
		document.getElementById('servers').style.display = "none";
		document.getElementById('servers2').style.display = "inline";
		var tirarbg = document.getElementById('epname').value;
		document.getElementById(tirarbg+"2").style.backgroundColor = "";//nome do titulo + id com o(2) para nao confundiar com outros
	}
	
	//on focus e on blur escolher episodios
	$('a').focus(
    function(){
        $(this).parent('div').css('backgroundColor','rgba(153, 0, 204,0.4)');
		//$(this).parent('div').css('opacity','0.3');
    }).blur(
    function(){
        //$(this).parent('div').css('backgroundColor','');
		//$(this).parent('div').css('opacity','');
    });
	
	//hover e quando perde o hover escolher episodios
	/*$("a").hover(
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