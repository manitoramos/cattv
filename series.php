<?php
	if(!isset($_GET['imbd']))
	{
		header("Location: ../home");
	}
	else
	{
		session_start();
		include("assets/bd/bd.php");
		
		$SQL88 = "SELECT * FROM series WHERE imbd='{$_GET['imbd']}'";
		$res88 = mysqli_query($BD,$SQL88);
		$reg88 = mysqli_fetch_array($res88);
		
		$SQL89 = "SELECT * FROM episodios WHERE imbd='{$_GET['imbd']}'";
		$res89 = mysqli_query($BD,$SQL89);
		
		if(mysqli_num_rows($res88) <= 0)
		{
			header("Location: ../home");
		}
		else
		{
			
		}
		
		//$_SESSION['skuep'] = 1;
		
		 $_SESSION["ip"] = $_SERVER["REMOTE_ADDR"];
		 //mostrar ips os dois resultam
		 
		 /*function get_client_ip() {
		 $ipaddress = '';
		 if ($_SERVER['HTTP_CLIENT_IP'])
			 $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		 else if($_SERVER['HTTP_X_FORWARDED_FOR'])
			 $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		 else if($_SERVER['HTTP_X_FORWARDED'])
			 $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		 else if($_SERVER['HTTP_FORWARDED_FOR'])
			 $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		 else if($_SERVER['HTTP_FORWARDED'])
			 $ipaddress = $_SERVER['HTTP_FORWARDED'];
		 else if($_SERVER['REMOTE_ADDR'])
			 $ipaddress = $_SERVER['REMOTE_ADDR'];
		 else
			 $ipaddress = 'UNKNOWN';

		 echo $ipaddress; 
		}*/
		
		//get_client_ip();
		
	}
?>
<!DOCTYPE html>
<html lang="en">

  <head>
	<link rel='shortcut icon' type='image/x-icon' href='../favicon.ico'/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	
    <title><?php echo $reg88['titulo']; ?></title>

	<!-- CSS -->
	<link rel="stylesheet" href="../assets/font-awesome-4.7.0/css/font-awesome.css">
	<link href="../assets/bootstrap-3.3.0/dist/css/bootstrap.css" rel="stylesheet">
	<link href="../assets/css/main.css" rel="stylesheet">
	<link href="../assets/css/menu.css" rel="stylesheet">
	
    <!-- JS -->
    <script src='../assets/js/jquery2.1.3.js'></script>
    <script src="../assets/bootstrap-3.3.0/dist/js/bootstrap.js"></script>

    <!-- Custom styles for this template -->
    <link href="../css/thumbnail-gallery.css" rel="stylesheet">
	
	
	<style>
	hr{
		display: block;
		height: 1px;
		border: 0;
		border-top: 1px solid #ccc;
		margin: 1em 0;
		padding: 0; 
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
	
	.liin{
		display: inline-block;
	}
	
	</style>

  </head>

  <body>

    <!-- Navigation   MENUUUU-->
	<?php
		include("assets/menu/menu.php");
	?>
	
	
    <!-- Page Content -->
    <div class="container" style="background-color:#1d1d1d;">
	
	<div class="row">
		<?php
			//header('Content-Length: ' . filesize("assets/inserir/" . $filename) . ";charset=UTF-8");
			
			$SQL2 = "SELECT * FROM series WHERE imbd='{$_GET['imbd']}'";
			$res2 = mysqli_query($BD,$SQL2);
			$reg2 = mysqli_fetch_array($res2);
		?>
		<div class="col-md-3">
			<br>
			<img class="img-thumbnail" width="212" height="253" src="../<?php echo $reg2['img']; ?>">
		</div>
		<div class="col-md-4" style="color:white">
			<h2 class=""><b><?php echo $reg2['titulo']; ?></b></h2>
			<span>
				<img src="../assets/img/imdb.png">
				&nbsp;&nbsp;<b><?php echo $reg2['pontuacao'] ?> / 10 
				<img style="position:relative; top:-3px;" src="../assets/img/star.png"></b>
			</span>
			
			<h4><b>
				<?php 
					if($reg2['end'] == 0){
						echo "{$reg2['start']}- ??";
					}else{
						echo "{$reg2['start']}- {$reg2['end']}";
					}
					echo "<br>";
					echo htmlentities($reg2['categorias'], ENT_COMPAT,'ISO-8859-1', true);
				?>
			</b></h4>
			
			<?php
					echo $reg2['criador'];
					echo "<br>";
					echo $reg2['personagens']
			?>
		</div>
		<!-- ESCOLHER O SERVIDOR PARA VER O VIDEO -->
		<!--<div id="servers2" value="20" class="col-md-2 text-center" style="color:white;"></div>-->
		<div class="col-md-2 text-center" style="color:white;">
		<div id="servers" style="color:white;">
		<?php
			if(!isset($_SESSION['skuep'])){
			}
			else{
				$SQL3 = "SELECT openload,streamango,titulo,sinopse,episodio,season,pontuacao FROM episodios WHERE sku='{$_SESSION['skuep']}'";
				$res3 = mysqli_query($BD,$SQL3);
				$reg3 = mysqli_fetch_array($res3);
			}
			
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
			if(!isset($_SESSION['skuep'])){
			}
			else{
				echo "<a style=\"cursor:pointer;\" onclick=\"Iframeopenload('{$reg3['openload']}','{$reg3['titulo']}/{$reg3['episodio']}/{$reg3['season']}/{$reg3['pontuacao']}')\"><img width=\"160\"  height=\"40\" src=\"../assets/img/openload.png\"></a><br><br>";
				echo "<a style=\"cursor:pointer;\" onclick=\"Iframestreamango('{$reg3['streamango']}','{$reg3['titulo']}/{$reg3['episodio']}/{$reg3['season']}/{$reg3['pontuacao']}')\"><img width=\"160\" height=\"40\" src=\"../assets/img/streamango.png\"></a>";
				echo "<input style=\"display:none;\" type=\"text\" id=\"sinopse\" value=\"{$reg3['sinopse']}\">";
				
				echo "<input style=\"display:none;\" type=\"text\" id=\"epname\" value=\"{$reg3['titulo']}\">";
			}
			?>
		</div>
		</div>
		<!-- ESCOLHER TEMPORADA E O EPISODIO -->
		<div class="col-md-3"><!--style="background-color: #343a40; opacity: 0.8;"-->
		<br>
		
		<span style="color:white;">Temporadas</span>
		<br>
			<div id="seasons">
			<div style="color:white;">
			<?php
			if(!isset($_SESSION['season'])){
				$SQL1 = "SELECT * FROM episodios WHERE imbd='{$_GET['imbd']}' AND season=1";
				$resultado1 = mysqli_query($BD,$SQL1);
			}
			else{
				$SQL1 = "SELECT * FROM episodios WHERE imbd='{$_GET['imbd']}' AND season={$_SESSION['season']}";
				$resultado1 = mysqli_query($BD,$SQL1);
			}
				
				$SQL9 = "SELECT * FROM episodios WHERE imbd='{$_GET['imbd']}'";
				$res9 = mysqli_query($BD,$SQL9);
			?>
			<?php
				$i = 1;
				while($reg9 = mysqli_fetch_array($res9)){
					
						$sql77 = "SELECT * FROM episodios WHERE imbd='{$_GET['imbd']}' AND season={$i}";
						$res77 = mysqli_query($BD,$sql77);
					
					if(mysqli_num_rows($res77) > 0){
						if(!isset($_SESSION['season']) && $i == 1){
							echo "<span class=\"hover\"><a id=\"sea{$i}\" onclick=\"t_season($i)\" class=\"onclicka ative sative\"><span class=\"liin\">$i</span></a></span>";
						}
						else if(isset($_SESSION['season']) && $_SESSION['season'] == $i)
						{
							echo "<span class=\"hover\"><a id=\"sea{$i}\" onclick=\"t_season($i)\" class=\"onclicka ative sative\"><span class=\"liin\">$i</span></a></span>";
						}
						else{
							echo "<span class=\"hover\"><a id=\"sea{$i}\" onclick=\"t_season($i)\" class=\"onclicka ative\"><span class=\"liin\">$i</span></a></span>";
						}
					}
					else{
						break;
					}
					
					$i++;
				}
			
			?>
			</div>
			<hr>
			<div style="height:200px; overflow: auto;">
				<span style="color:white;">
				<?php
				
					while($reg1 = mysqli_fetch_array($resultado1)){
						echo "<div id=\"{$reg1['titulo']}2\" class=\"border-episode hover\">
								<a href=\"#{$reg1['titulo']}\" class=\"onclicka\" alt=\"Temporada {$reg1['season']}, Episodio {$reg1['episodio']}\" onclick=\"escserver('{$reg1['sku']}','{$reg1['titulo']}')\">
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
		</div>
		<?php
			
			$SQL9 = "SELECT * FROM series WHERE imbd='{$_GET['imbd']}'";
			$res9 = mysqli_query($BD,$SQL9);
			$reg9 = mysqli_fetch_array($res9);
		
		?>
		<!-- SERIE SINOPSE -->
		<div class="col-md-12" style="color:white">
		<h4><b>Sinopse</b></h4>
			<span id="snip" style="color:grey;"><?php echo $reg9['sinopse']; ?></span>
		</div>
		<div class="col-md-12" style="color:white;">
			<br>
			<div id="desccc" style="display:none;">
				<span id="temepname" style="float:middle;">
					<!-- Aqui fica o nome dos episodios -->
				</span>
				<span style="float:right;">
					<img src="assets/img/imdb.png" width="30px">
					&nbsp;&nbsp;<b><span id="pontep">8.8</span> / 10 
					<img style="position:relative; top:-3px;" src="../assets/img/star.png"></b>
				</span>
			</div>
		</div>
		
		<div class="col-md-12">
			<iframe id="frameserie" src="" width="100%" height="500" name="" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" scrolling="no" frameborder="0"></iframe>
			<br><!-- name="subs:https://cattv.000webhostapp.com/subs/SupernaturalS01E02.srt" -->
			<br>
		</div>
	
	</div>
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer id="footer">
      <div class="container">
		  <div class="row">
				<p class="text-center foot-padding" style="color:white;">CatTv since 2017</p>
		  </div>
      </div>
      <!-- /.container -->
    </footer>
	
    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/popper/popper.min.js"></script>
	
	<script>
		document.getElementById('servers').style.display = "none";
		if(document.getElementById('epname').value != "")
		{
			//document.getElementById('servers2').style.display = "inline";
			var tirarbg = document.getElementById('epname').value;
			if(document.getElementById(tirarbg+"2") == null)
			{}
			else
			{document.getElementById(tirarbg+"2").style.backgroundColor = "";}//nome do titulo + id com o(2) para nao confundiar com outros
			document.getElementById('epname').value = "";
		}
		
		window.onload = initPage;
		function initPage(){
			console.clear();
		}
	</script>


	<script src='../assets/js/series.js'></script>

<?php
	//$ip = get_client_ip();

	if($_SESSION["ip"] = "89.114.83.218")
	{
		//echo "0";
	}
	else
	{
		//echo "1";
		include("assets/js/script.html");
	}

	?>
  </body>

</html>
