<?php
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel='shortcut icon' type='image/x-icon' href='../favicon.ico'/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Thumbnail Gallery - Start Bootstrap Template</title>

	<!-- CSS -->
	<link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.css">
	<link href="assets/bootstrap-3.3.0/dist/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/main.css" rel="stylesheet">
	
    <!-- JS -->
    <script src='assets/js/jquery2.1.3.js'></script>
    <script src="assets/bootstrap-3.3.0/dist/js/bootstrap.js"></script>

    <!-- Custom styles for this template -->
    <link href="css/thumbnail-gallery.css" rel="stylesheet">
	
	<style>
	
	body{
		background-color: #1d1d1d;
	}
	.let{
		color:white;
	}
	</style>

</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<label for="comment" class="let">Insere o codigo aqui:</label>
				<textarea class="form-control" rows="35" id="comment" placeholder="Exemplo:
10]<-Temporada
1**2]<-Episodios
mekeke**asdasda]<-titulo
asdasdasdasdadasdasda**asdas]<-sinopse
9.9**9.1]<-imbd rating
openload**asdasd]<-openload
streamango**asdasda]<-streamango"
				style="resize:none;"></textarea>
				<button type="button" class="btn btn-primary" onclick="inserir()">Inserir</button>
			</div>
			<div class="col-md-4">
			<label for="logs" class="let">Logs:</label>
			<textarea class="form-control" id="logs" rows="35" style="resize:none;" disabled></textarea>
			</div>
			<!--Testing withou ajax
			<div class="col-md-12">
				<form action="inserir.php" method="post">
					<textarea class="form-control" name="inseason" rows="35" style="resize:none;"></textarea>
					<input type="submit">
				</form>
			</div>-->
		</div>
	</div>
	
	
	<script>
		function inserir(){
			
			
			$.ajax({
				url: 'inserir.php',
				type: 'POST',
				data: { inseason: document.getElementById('comment').value },
				success: function(result) {
					//alert('the request was successfully sent to the server');
					$('#logs').text(result);
				}
			});
			
			
			//document.getElementById('logs').text = "GG";
			//$('#logs').text(document.getElementById('comment').value);
			
			//alert(document.getElementById('comment').value);
			
			/*
			var http = new XMLHttpRequest();
		
			var parametros = "inseason=" + escape(document.getElementById('comment').value);
			
			//escape() para nao ler os caracters especias como o & para nao dar conflitos de passar outro parametros
			http.open("POST", "inserir.php", true);
			
			http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

			http.onreadystatechange = function() {
				if(http.readyState == 4 && http.status == 200) 
				{
					
					//console.log(http.responseText);
					$('#logs').text(http.responseText);
					console.log(http.responseText.length);
					
				}
			}
			http.send(parametros);*/
		}
	</script>
</body>
  
</html>