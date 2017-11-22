<?php
	include("assets/bd/bd.php");
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CatTv - Home</title>

    <!-- CSS -->
	<link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.css">
	<link href="assets/bootstrap-3.3.0/dist/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/main.css" rel="stylesheet">
	<link href="assets/css/index.css" rel="stylesheet">
	<link href="assets/css/menu.css" rel="stylesheet">
	
    <!-- JS -->
    <script src='assets/js/jquery2.1.3.js'></script>
    <script src="assets/bootstrap-3.3.0/dist/js/bootstrap.js"></script>

    <!-- Custom styles for this template -->
    <link href="css/thumbnail-gallery.css" rel="stylesheet">
	
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

    <!-- Page Content-->
    <div class="container">

      <h1 class="text-center" style="color:white;">Series</h1>

      <div class="row text-center">
	  
	  <?php
		$SQL88 = "SELECT * FROM series";
		$res88 = mysqli_query($BD,$SQL88);
		$first = 0;
		while($reg88 = mysqli_fetch_array($res88)){
			if($first == 0){
				echo "<div class=\"col-lg-3 col-md-4 col-xs-6\" style=\"\">
			  <a href=\"series/{$reg88['imbd']}\" class=\"\">
				<img class=\"img-fluid img-thumbnail imgthumb\" src=\"{$reg88['img']}\" alt=\"\">
			  </a>
				</div>";
				$first++;
			}
			else
			{
				echo "<div class=\"col-lg-3 col-md-4 col-xs-6\" style=\"margin-left: -7%;\">
			  <a href=\"series/{$reg88['imbd']}\" class=\"\">
				<img class=\"img-fluid img-thumbnail imgthumb\" src=\"{$reg88['img']}\" alt=\"\">
			  </a>
				</div>";
			}
			
		}
	  
	  ?>
		<!-- nova row 5 em 5 -->
      </div>

    </div> 
    <!-- /.container -->

    <!-- Footer -->
    <div id="footer">
      <div class="container">
		  <div class="row">
				<p class="text-center foot-padding" style="color:white;">CatTv since 2017</p>
		  </div>
      </div>
      <!-- /.container -->
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/popper/popper.min.js"></script>

  </body>

</html>
