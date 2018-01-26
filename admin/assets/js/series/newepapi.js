
	//$( "#ttsda" ).click(function() {
	  //alert(document.getElementById('doing').innerHTML);
	//});


	var verglb = "";//para dizer se é KB/MB OU GB
	var allpercent = [];

	// Decimal round
	function prnd(number, precision) {
	  var factor = Math.pow(10, precision);
	  return Math.round(number * factor) / factor;
	}

	function allbyt(byte){//passar os bytes para kb porem depende do tamanho da file
		var kbb = byte / 1024;
		if(kbb > 1000){
			var mbb = byte / 1048576;
			if(mbb > 1000){
				var gbb = byte / 1073741824;
				verglb = "GB";
				return gbb;
			}
			else{verglb = "MB";return mbb;}
		}
		else{verglb = "KB";return kbb;}
	}


	function mandajson(reqst)
	{
		$.ajax({
            url: '../another.php',
            type: 'POST',
            data: { responsee: reqst },
            success: function(data) {
                console.log(data);
            }
        });
	}

	var sec = 0;var min = 0;var hor = 0;
	function myTimer(){
		sec++;
		if(sec == 60){min++;sec = 0;}
		if(min == 60){hor++;min = 0;}
		if(sec < 10){$("#timer").html(min + ":0" + sec + "s");}
		else{$("#timer").html(min + ":" + sec + "s");}
	}


	(function () {
		var fileCatcher = document.getElementById('file-catcher');
	  	var fileInput = document.getElementById('file-input');
	 	var fileListDisplay = document.getElementById('file-list-display');
  
  		var fileList = [];
  		var renderFileList, sendFile;

  		var sizefiles = 0;
  		var arrayup = [];
  		var request; //
  		var stopupl = -1;
  		var antigoeload = 0;
  		var upsecc = 0; // velocidade de upload dividir por 2,08 e da a velocidade de upload(e.loaded)
  		var ttfls = 0; // totoal files
  		var completos = 0; //completas
  		var nextfile = -1;//proxima para ser mandada para a queue depois da anteriror ter sido completa
  		var firstfile = 0;//renderlist para saber qunado meter o header
  
	  /*fileCatcher.addEventListener('submit', function (evnt) {
	  	evnt.preventDefault();
	    fileList.forEach(function (file,index) {//meti index aqui
	    		sendFile(file,index);//meti index aqui
	    });
	  });*/


	  //******TESTES MEUSS*************
		fileCatcher.addEventListener('submit', function (evnt) {//manda o primeiro index para upload
			  	evnt.preventDefault();
			  	if(fileInput.files.length <= 0){
	  				return -1;
	  			}
	  			else{
			  		nextfile++;
			  		stopupl = -1;
			  		request = null;
			    	sendFile(fileList[nextfile],nextfile);//meti index aqui
			    }
		});


		function sendmore()//para mandar as seguintes sem contar com o index(0)
		{
			nextfile++;
			sendFile(fileList[nextfile],nextfile);
		}


	  //*******TESTES******************
	  
	  fileInput.addEventListener('change', function (evnt) {
	  		//firstfile = 0;
	  		nextfile = -1;ttfls = 0;allpercent = [];completos = 0;
	  		if(fileInput.files.length >= 1){//se tiver pelo menos 1 ficheiro escolhido deixa clicar no butao
	  			$("#buttsend").prop('disabled', false);
	  			$("#headtable").show();
	  			$("#bottable").show();
	  		}
	  		else{
	  			$("#buttsend").prop('disabled', true);
	  			$("#headtable").hide();
	  			$("#bottable").hide();
	  		}
	  		sizefiles = 0;fileList = [];
	  	for (var i = 0; i < fileInput.files.length; i++) {
	    	fileList.push(fileInput.files[i]);
	    }
	    $("#sizeenv").show();
	    $("#sizesend").show();
	    renderFileList();
	  });
	  
	  renderFileList = function () {
	  	fileListDisplay.innerHTML = '';
	    fileList.forEach(function (file, index) {
	    	var fileDisplayEl = document.createElement('tr');
	    	/*if(firstfile == 0){
	    		var fileDisplayEl2 = document.createElement('tr');
	    		firstfile++;
	    		fileDisplayEl2.innerHTML = "<th>#</th><th>Filename</th><th>Size</th><th>Status</th>";
	    		fileListDisplay.appendChild(fileDisplayEl2);
	    	}*/
	      	//fileDisplayEl.innerHTML = (index + 1) + ': ' + file.name + ' :: bytes:' + file.size + '<br>';
	      	fileDisplayEl.innerHTML = "<td class='tdnumb'>"+(index + 1)+"</td><td class='tdfn'>"+file.name+"</td><td class='tdsize'>"+prnd(allbyt(file.size), 2)+verglb+"</td><td class='tdstatus' id='ongoing"+(index +1)+"'>0%</td>";
	       	sizefiles += file.size;
	       	allpercent[index] = 0;
	       	//document.getElementById('doing').innerHTML = sizefiles;
	       	$("#sizemb").html(prnd(allbyt(sizefiles), 2) + verglb);
	       	$("#totalflls").html(prnd(allbyt(sizefiles), 2) + verglb);
	       	ttfls++;//para saber quantas files tem de ser mandadas para o sendFile
	      fileListDisplay.appendChild(fileDisplayEl);
	      $("#howmany").html(index + 1);
	    });
	  };
	  
	  sendFile = function (file,index) {//meti o index aqui
	  	$("#ttsda").fadeIn();
	  	var formData = new FormData();
	    request = new XMLHttpRequest();


    //console.log(file);

    request.upload.addEventListener('progress',function(e){

    	//fazer upload com os bytes guardar o file.size numa variavel.
    	var getpercent = 0;//saber a percentagem de todas as files
    	var percent = Math.floor(e.loaded/e.total * 100);
    	if(index == 0){
    		arrayup[index] = e.loaded;
    		antigoeload = e.loaded;
    	}
    	else{
    		arrayup[index] = e.loaded;
    		antigoeload = arrayup[index-1] + (e.loaded);
    		//console.log(antigoeload);
    	}

    	//Para ter a percentagem total de todos
    	allpercent[index] = percent;
    	for(i = 0; i < ttfls; i++)
    	{
    		getpercent = (getpercent + allpercent[i]);
    		//console.log(getpercent);
    	}
    	getpercent = getpercent / ttfls;
    	var getprog = prnd(getpercent,0)
    	$("#ttstt").html(getprog + "%");

    	//alert(fileList[0].index);
    	//console.log(fileList[0]);
    	//console.log(nextfile);
    	/* WORKING VELOCIDADE DE UPLOAD
    	if(antigoeload == 0){
    		antigoeload = e.loaded;
    		upsecc = antigoeload;
    		$("#upersec").html(prnd(allbyt(upsecc), 2) + verglb);
    		console.log(upsecc);
    	}
    	else{
    		upsecc = e.loaded - antigoeload;
    		antigoeload = e.loaded;
    		$("#upersec").html(prnd(allbyt(upsecc), 2) + verglb);
    		console.log(upsecc);
    	}
		*/
    	//document.querySelector('#progress').innerHTML = Math.round(e.loaded/e.total * 100) + '%';
    	var indt = (index + 1);
    	$("#ongoing"+indt).addClass("clrgoing");//mete a % em cor azul enquanto esta a fazer upload
    	$("#ongoing"+indt).html(percent + "%");
    	$('.progress-bar').width(getprog + '%');
    	if(getprog < 19){$('.progress-bar').html('<div id="progress-status">'+getprog+'%</div>');}
    	else{$('.progress-bar').html('<div id="progress-status">'+getprog+'% - '+ completos + ' de ' + $('#howmany').html() +' Completos</div>');}	
		$('#percenttt').html(percent);
		if(index != 0){$("#sizeenv").html(prnd(allbyt(antigoeload), 2) + verglb + " de ");}//dados enviados
		else{$("#sizeenv").html(prnd(allbyt(e.loaded), 2) + verglb + " de ");}//dados enviados



    },false)


	request.onabort = function (e) {
  		stopupl = 1;
	};

 
    formData.set('file', file);
    request.open("POST", 'https://1fiafqj.oloadcdn.net/uls/h_REKDAx7S57b-km');
    request.send(formData);

	   request.onreadystatechange = function() {
		if(request.readyState == 4 && request.status == 200) 
		{
			if(stopupl == 1){//quando o download é cancelado
				$(".progress-bar").addClass("progress-bar-warning");
				$(".progress-bar").removeClass("progress-bar-animated");
				$(".progress-bar").html("Upload Cancelado!!");
			}
			else{
				completos++;
				$("#donee").html(completos);
						
						
				//console.log(http.responseText);
				//$('#logs').text(request.responseText);
				if(request.responseText != ""){
					console.log(JSON.parse(request.responseText));//imprime em Json
				}
				if(completos != ttfls){
					//alguma coisa aqui se for preciso 
				}
				else{
					$(".progress-bar").addClass("bg-success");
					$(".progress-bar").removeClass("progress-bar-animated");
					$(".progress-bar").html('<div id="progress-status">'+ $('#percenttt').html() +'% - '+ $('#donee').html() + ' de ' + $('#howmany').html() +' Completos</div>');
							//console.log($('.progress-bar').width());
				}
				var indt2 = (index + 1);
    			$("#ongoing"+indt2).addClass("clrsucess");//meter a % em verde para cada 1
				mandajson(request.responseText);
				if(completos == ttfls){clearTimeout(tim)}//verifica se o numero de upload completos e igual ao total de files
				else{setTimeout(function(){ sendmore()}, 1000);}//espera 2 segundos para lançar outro file para update

			}

		}
		else if(request.readyState == 4 && request.status == 0)//quando da erro no upload ou é parado
		{
			//para meter alguma coisa depois quando der erro
			console.log(request);
		}
	}

  }

  $(document).on('click', '#testeee', function(e){
  	if(request != null)
  	{
    	request.abort();
    }
	});
})();
