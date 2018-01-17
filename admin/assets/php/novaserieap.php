<?php
	
	include "../bd/bd.php";

	$imdb = $_POST["imdb2"];
	//$cacheimdb = file_get_contents("http://www.omdbapi.com/?i=". $imdb ."&plot=full&apikey=b13d4ac4");
	//$open = fopen("assets/cacheimdb/{$imdb}.json", "w+");
	//fwrite($open, $cacheimdb);
	//fclose($open);

	//&plot=full se quiser a sinopse toda
	$cod = json_decode(file_get_contents("http://www.omdbapi.com/?i=". $imdb ."&apikey=b13d4ac4"));

	//echo $cod->Genre;
	//exit();

	//echo $cod->Title;
	//echo "<br>";
	//echo $cod->Ratings[0]->Source;

	if($_FILES["img2"]["tmp_name"] == ""){
		$imgact = 1;//quando o utilizador nao meteu nenhuma imagem
	}
	else{
		$imgact = 2;//quando o utilizador inseriou uma imagem
	}


	$allcat = explode(", ", $cod->Genre);

	$arrlength = count($allcat);
	//echo $arrlength;



	//Traduzir as categorias para por na basedados
	$cat = array(
		"Drama"=>"Drama",
		"Fantasy"=>"Fantasia", 
		"Horror"=>"Terror",
		"Sci-Fi"=>"Ficção científica",
		"Adventure"=>"Aventura",
		"Action"=>"Ação",
		"History"=>"História",
		"Comedy"=>"Comédia",
		"Romance"=>"Romance",
	);

	$rabit = 0;
	$catgo = "";

	foreach($cat as $eng => $por) {
		for($x = 0; $x < $arrlength; $x++) {
		    if($allcat[$x] == $eng){
		    	if($rabit == 0){
					$catgo = $por;
					$rabit = 1;
		    	}
		    	else{
		    		$catgo .= ", " . $por;//categorias traduzidas para portugues
		    	}
		    }
		}
	}


	$datee = explode("-", $cod->Year);

	if(!isset($datee[1]))
	{
		$datee[1] = 0;
	}

	$catgoo = utf8_decode($catgo);

	if($imgact == 1){//quando vai ser inserido uma imagem direta da imdb

		//select para ver se ja existe a serie na basedados
		$sel = "SELECT * FROM series WHERE imbd='{$imdb}'";
		if ($result = mysqli_query($BD, $sel)) {
		    //echo "true";//return to javascript
		} else {
		    echo "Error: " . $sel . "<br>" . mysqli_error($BD);//return to javascript
		}
		//numero de rows que existe no selecet se for maior que 0 ja existe
		$rowcnt = $result->num_rows;

		if($rowcnt > 0){
			echo "already";
			exit();
		}
		//$imdb,Title,imdbRating,Year,Genre,Writer,Actors,Poster,Plot
		$sql2 = "INSERT INTO series (imbd, titulo, pontuacao, start, end, categorias, criador, personagens, img, sinopse)
		VALUES ('{$imdb}', '{$cod->Title}', '{$cod->imdbRating}', '{$datee[0]}', '{$datee[1]}', '{$catgoo}', '{$cod->Writer}', '{$cod->Actors}', '{$cod->Poster}', '{$cod->Plot}')";
		//echo "direta do imdb";

	}
	else if($imgact == 2)//para ser inserido uma imagem pelo utilizador
	{
		//verifica se ele esta a inserir uma imagem se for outro tipo de ficheiro da erro
		if(is_array($_FILES)){
		    $check = getimagesize($_FILES["img2"]["tmp_name"]);
			if($check !== false){
			}
			else{
				echo "falseimg";
				exit();
			}
		}

		$i = rand(1 , 3000000);

		//verificar se a imagem ja existe no diretorio
		if (file_exists("../../../assets/img/{$i}" . $_FILES['img2']['name'])) {
		    //print $pasta . DIRECTORY_SEPARATOR . $imagem;
			echo "again";
			exit();
		}

		//select para ver se ja existe a serie na basedados
		$sel = "SELECT * FROM series WHERE imbd='{$imdb}'";
		if ($result = mysqli_query($BD, $sel)) {
		    //echo "true";//return to javascript
		} else {
		    echo "Error: " . $sel . "<br>" . mysqli_error($BD);//return to javascript
		}
		//numero de rows que existe no selecet se for maior que 0 ja existe
		$rowcnt = $result->num_rows;

		//pasta do diretorio de onde fica a imagem para meter na basedados
		$target = "assets/img/{$i}".$_FILES['img2']['name'];

		if($rowcnt > 0){
			echo "already";
			exit();
		}

		if(is_array($_FILES)) {
			if(is_uploaded_file($_FILES['img2']['tmp_name'])) {
			$sourcePath = $_FILES['img2']['tmp_name'];
			$targetPath = "../../../assets/img/{$i}".$_FILES['img2']['name'];
			if(move_uploaded_file($sourcePath,$targetPath)) {
			}
			}
			//echo "true/";
		}

		//$imdb,Title,imdbRating,Year,Genre,Writer,Actors,Poster,Plot
		$sql2 = "INSERT INTO series (imbd, titulo, pontuacao, start, end, categorias, criador, personagens, img, sinopse)
		VALUES ('{$imdb}', '{$cod->Title}', '{$cod->imdbRating}', '{$datee[0]}', '{$datee[1]}', '{$catgoo}', '{$cod->Writer}', '{$cod->Actors}', '{$target}', '{$cod->Plot}')";
		//echo "pelo utilizador";
	}
	
	if ($BD->query($sql2) === TRUE) {
	    echo "true";//return to javascript
	} else {
	    echo "/Error: " . $sql2 . "<br>" . $BD->error;//return to javascript
	}

?>