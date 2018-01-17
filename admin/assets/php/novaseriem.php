<?php

include "../bd/bd.php";
//require_once
//posts -> imdb, titulo, rating, begin, end, categorias, criador, personagens, img;

//echo $_POST["imdb"];
//echo $_POST["titulo"];
//echo $_POST["rating"];
//echo $_POST["begin"];
//echo $_POST["end"];
//echo $_POST["categorias"];
//echo $_POST["criador"];
//echo $_POST["personagens"];
//echo $_POST["sinopse"];
//@extract($_POST); Exemplo $_POST['ei'] fica $ei;

//verifica se ele esta a inserir uma imagem se for outro tipo de ficheiro da erro
if(is_array($_FILES)){
    $check = getimagesize($_FILES["img"]["tmp_name"]);
	if($check !== false){
	}
	else{
		echo "falseimg";
		exit();
	}
}

$i = rand(1 , 3000000);

//verificar se a imagem ja existe no diretorio
if (file_exists("../../../assets/img/{$i}" . $_FILES['img']['name'])) {
    //print $pasta . DIRECTORY_SEPARATOR . $imagem;
	echo "again";
	exit();
}

//select para ver se ja existe a serie na basedados
$sel = "SELECT * FROM series WHERE imbd='{$_POST['imdb']}'";
if ($result = mysqli_query($BD, $sel)) {
    echo "true";//return to javascript
} else {
    echo "Error: " . $sel . "<br>" . mysqli_error($BD);//return to javascript
}
//numero de rows que existe no selecet se for maior que 0 ja existe
$rowcnt = $result->num_rows;

//pasta do diretorio de onde fica a imagem para meter na basedados
$target = "assets/img/{$i}".$_FILES['img']['name'];

if($rowcnt <= 0){
	//inser a imagem na pasta de imagens de perfil
	if(is_array($_FILES)) {
		if(is_uploaded_file($_FILES['img']['tmp_name'])) {
		$sourcePath = $_FILES['img']['tmp_name'];
		$targetPath = "../../../assets/img/{$i}".$_FILES['img']['name'];
		if(move_uploaded_file($sourcePath,$targetPath)) {
		}
		}
		//echo "true/";
	}

	$sinopse = addslashes($_POST['sinopse']);
	$categ = utf8_decode($_POST['categorias']);

	$sql = "INSERT INTO series (imbd, titulo, pontuacao, start, end, categorias, criador, personagens, img, sinopse)
	VALUES ('{$_POST['imdb']}', '{$_POST['titulo']}', '{$_POST['rating']}', '{$_POST['begin']}', '{$_POST['end']}', '{$categ}', '{$_POST['criador']}', '{$_POST['personagens']}', '{$target}', '{$sinopse}')";


	if ($BD->query($sql) === TRUE) {
	    echo "/true";//return to javascript
	} else {
	    echo "/Error: " . $sql . "<br>" . $BD->error;//return to javascript
	}
}
else
{
	echo "/already";
}



?>