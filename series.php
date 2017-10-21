<?php
	session_start();
	//$_SESSION['skuep'] = 1;
	include("assets/bd/bd.php");
?>
<!DOCTYPE html>
<html lang="en">

  <head>

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
	hr {
		display: block;
		height: 1px;
		border: 0;
		border-top: 1px solid #ccc;
		margin: 1em 0;
		padding: 0; 
	}
	body{
		background-color: #1d1d1d;
	}
	footer{
		border-top: solid #080808;
		border-width: 0 0 1px;
		border-radius: 0px;
		background-color:#222
	}
	
	.foot-padding{
		padding: 10px 0px 3px 0px;
	}
	
	.border-episode{
		opacity: 0.8;	
	}
	

	
	.nothing{
		border-radius: 0px;
		border-width: 1px 1px 1px;
		border-style: solid;
		border-color: #fff;
	}
	
	</style>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">CatTv</a>
    </div>
    <ul class="nav navbar-nav">
      <li class=""><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
    <!-- Page Content -->
    <div class="container" style="background-color:#1d1d1d;">
	
	<div class="row">
		<?php
			$SQL2 = "SELECT * FROM series WHERE imbd='tt0460681'";
			$res2 = mysqli_query($BD,$SQL2);
			$reg2 = mysqli_fetch_array($res2);
		?>
		<div class="col-md-3">
			<br>
			<img class="img-thumbnail" width="212" height="253" src="assets/img/supernatural.png">
		</div>
		<div class="col-md-4" style="color:white">
			<h2 class=""><b><?php echo $reg2['titulo']; ?></b></h2>
			<span>
				<img src="assets/img/imdb.png">
				&nbsp;&nbsp;<b><?php echo $reg2['pontuacao'] ?> / 10 
				<img style="position:relative; top:-3px;" src="assets/img/star.png"></b>
			</span>
			
			<h4><b>
				<?php 
					if($reg2['end'] == 0){
						echo "{$reg2['start']}- ??";
					}else{
						echo "{$reg2['start']}- {$reg2['end']}";
					}
					echo "<br>";
					echo $reg2['categorias'];
				?>
			</b></h4>
			
			<?php
					echo $reg2['criador'];
					echo "<br>";
					echo $reg2['personagens']
			?>
		</div>
		<!-- ESCOLHER O SERVIDOR PARA VER O VIDEO -->
		<div id="servers2" value="20" class="col-md-2 text-center" style="color:white;"></div>
		<div id="servers" class="col-md-2 text-center" style="color:white;">
		<?php
			$SQL3 = "SELECT openload,streamango,titulo FROM episodios WHERE sku='{$_SESSION['skuep']}'";
			$res3 = mysqli_query($BD,$SQL3);
			$reg3 = mysqli_fetch_array($res3);
			
			//echo $_SESSION['skuep'];
		?>
			<br>
			<span style="float:right;">
				<a href="#" class="fa fa-times onclicka" onclick="noneserver()"></a>
			</span>
			<br>
			<h4>Escolha o Servidor:</h4>
			<span class="glyphicon glyphicon-arrow-down"></span>
			<span class="glyphicon glyphicon-arrow-down"></span>
			<br><br>
			<?php
				echo "<a href=\"#\" onclick=\"Iframeopenload()\"><img width=\"160\"  height=\"40\" src=\"assets/img/openload.png\"></a><br><br>";
				echo "<a href=\"#\" onclick=\"Iframestreamango()\"><img width=\"160\" height=\"40\" src=\"assets/img/streamango.png\"></a>";
				echo "<input style=\"display:none;\" type=\"text\" id=\"openload\" value=\"{$reg3['openload']}\">";
				echo "<input style=\"display:none;\" type=\"text\" id=\"streamango\" value=\"{$reg3['streamango']}\">";
				
				echo "<input style=\"display:none;\" type=\"text\" id=\"epname\" value=\"{$reg3['titulo']}\">";
			?>
		</div>
		<!-- ESCOLHER TEMPORADA E O EPISODIO -->
		<div class="col-md-3"><!--style="background-color: #343a40; opacity: 0.8;"-->
		<br>
		<?php
			$SQL1 = "SELECT * FROM episodios WHERE imbd='tt0460681'";
			$resultado1 = mysqli_query($BD,$SQL1);
		?>
		<span style="color:white;">Temporadas</span>
		<br>
		<span style="color:white;">1 2 3</span>
		<hr>
		<div style="height:200px; overflow: auto;">
			<span style="color:white;">
			<?php
			
				while($reg1 = mysqli_fetch_array($resultado1)){
					echo "<div id=\"{$reg1['titulo']}2\" class=\"border-episode hover\">
							<a href=\"#{$reg1['titulo']}\" class=\"onclicka\" alt=\"Temporada {$reg1['season']}, Episodio {$reg1['episodio']}\" onclick=\"escserver({$reg1['sku']})\">
							<div>
								{$reg1['episodio']} {$reg1['titulo']}
							</div>
							</a>
						</div>";
				}
			?>
			</span>
		</div>
		
		</div>
		<!-- SERIE SINOPSE -->
		<div class="col-md-12" style="color:white">
		<h4><b>Sinopse</b></h4>
		<span style="color:grey;">Two brothers follow their father's footsteps as "hunters" fighting evil supernatural beings of many kinds including monsters, demons, and gods that roam the earth.</span>
		</div>
		
		<div class="col-md-12">
			<br>
			<iframe id="frameserie" src="https://openload.co/embed/CBQBfDFZDSA/SupernaturalS01E01%5Bcattv%5D.mkv.mp4" width="100%" height="500" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" scrolling="no" frameborder="0"></iframe>
			<br>
			<br>
		</div>
	
	</div>
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer>
      <div class="container">
		  <div class="row">
				<p class="text-center foot-padding" style="color:white;">CatTv since 2017</p>
		  </div>
      </div>
      <!-- /.container -->
    </footer>
	
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/popper/popper.min.js"></script>
	
	<script>
		document.getElementById('servers').style.display = "none";
		if(document.getElementById('epname').value != "")
		{
			document.getElementById('servers2').style.display = "inline";
			var tirarbg = document.getElementById('epname').value;
			document.getElementById(tirarbg+"2").style.backgroundColor = "";//nome do titulo + id com o(2) para nao confundiar com outros
		}
	</script>
	<script src='assets/js/series.js'></script>

  </body>

</html>
