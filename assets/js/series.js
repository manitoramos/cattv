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
	
	function escserver(){
		$( "#servers" ).load( "series.php #servers", function() {
			document.getElementById('servers').style.display = "inline";
			document.getElementById('servers2').style.display = "none";
			$("#servers").attr("class", "");
		});
		 
		  //$("#servers").removeClass("col-md-12");
	}
	
	function noneserver(){
		document.getElementById('servers').style.display = "none";
		document.getElementById('servers2').style.display = "inline";
	}
	
	//on focus e on blur escolher episodios
	$('a').focus(
    function(){
        $(this).parent('div').css('backgroundColor','#9900cc');
		$(this).parent('div').css('opacity','0.3');
    }).blur(
    function(){
        $(this).parent('div').css('backgroundColor','');
		$(this).parent('div').css('opacity','');
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