function loadIframe(url) {
	//var url = 'https://openload.co/embed/GEaaT2iALI8/SupernaturalS01E11%5Bcattv%5D.mp4';
    var $iframe = $('#frameserie');
		if ( $iframe.length ) {
			$iframe.attr('src',url);   
			return false;
		}
		return true;
	}
	
	function escserver(){
		document.getElementById('servers').style.display = "inline";
		document.getElementById('servers2').style.display = "none";
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
        $(this).parent('div').css('backgroundColor','#1d1d1d');
		$(this).parent('div').css('opacity','1');
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
	);