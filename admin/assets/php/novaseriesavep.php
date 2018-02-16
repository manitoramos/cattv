<?php
	
	include "../bd/bd.php";


	if($_POST['work'] == "hashsupload")
	{

		$cod = json_decode($_POST['responsee']);


		echo $cod->result->id;

		$id = $cod->result->id;
		$name = $cod->result->name;

		//verificar qual servidor foi inserido (openload ou streamango)
		$pieces = explode("/", $cod->result->url);
		if($pieces[2] == "openload.co"){$upp = 1;}//1 = openload
			else if($pieces[2] == "streamango.com"){$upp = 2;}//2 = streamango


		//select para ver se ja existe a serie na basedados
		$slct = "SELECT sku FROM uploading WHERE name='{$name}'";
		if ($result = mysqli_query($BD, $slct)) {
		    //echo "true";//return to javascript
		} else {
		    //echo "Error: " . $slct . "<br>" . mysqli_error($BD);//return to javascript
		}
		//numero de rows que existe no selecet se for maior que 0 ja existe
		$rowcnt = $result->num_rows;

		$reg = mysqli_fetch_array($result);

		if($rowcnt > 0){//caso ja exita na basedados entra aqui
			if($upp == 1){
				$sql = "UPDATE uploading SET openload='$id' WHERE sku={$reg['sku']}";

				if ($BD->query($sql) === TRUE) {
				    //echo "/true";//return to javascript
				} else {
				    //echo "/Error: " . $sql . "<br>" . $BD->error;//return to javascript
				}
			}
			else if($upp == 2){
				$sql = "UPDATE uploading SET streamango='$id' WHERE sku={$reg['sku']}";

				if ($BD->query($sql) === TRUE) {
				    //echo "/true";//return to javascript
				} else {
				    //echo "/Error: " . $sql . "<br>" . $BD->error;//return to javascript
				}
			}
			
		}
		else{//caso nao exita vem para aqui
			if($upp == 1){
				$sql = "INSERT INTO uploading (name,openload) VALUES ('{$name}','{$id}')";

				if ($BD->query($sql) === TRUE) {
				    //echo "/true";//return to javascript
				} else {
				    //echo "/Error: " . $sql . "<br>" . $BD->error;//return to javascript
				}
			}
			else if($upp == 2){
				$sql = "INSERT INTO uploading (name,streamango) VALUES ('{$name}','{$id}')";

				if ($BD->query($sql) === TRUE) {
				    //echo "/true";//return to javascript
				} else {
				    //echo "/Error: " . $sql . "<br>" . $BD->error;//return to javascript
				}
			}
			
		}

	}
	else if($_POST['work'] == "publishep")
	{


		/*$verihash = 0;// 1 correto -- 2 incorreto tem de ser feito outravez
		$gerhash = 0;//0 nao ta a fazer nada -- 1 gerando -- 2 gerado -- 3 verificando hash 4 all perfect


		function GeraHash($qtd){ 
		//Under the string $Caracteres you write all the characters you want to be used to randomly generate the code. 
		$Caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890_-'; 
		$QuantidadeCaracteres = strlen($Caracteres); 
		$QuantidadeCaracteres--; 

		$Hash=NULL; 
		    for($x=1;$x<=$qtd;$x++){ 
		        $Posicao = rand(0,$QuantidadeCaracteres); 
		        $Hash .= substr($Caracteres,$Posicao,1); 
		    } 
		$gerhash = 2;
		return $Hash; 
		} 

		//Here you specify how many characters the returning string must have 
		//$subhash = GeraHash(40);

		//echo $subhash;ANTIO GERADOR DE HASH QUE NAO VERIFICAVA SE JA EXISTIA ESSE HASH NA BASEDADOS*/


		$verihash = 0;// 1 gerado com sucesso -- 0 estado inicial
		$gerhash = 0;// 1 ja usado -- 0 estado inicial


			do{
				$Caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890_-'; 
				$QuantidadeCaracteres = strlen($Caracteres); 
				$QuantidadeCaracteres--; 

				$Hash=NULL; 
				    for($x=1;$x<=40;$x++){ 
				        $Posicao = rand(0,$QuantidadeCaracteres); 
				        $Hash .= substr($Caracteres,$Posicao,1); 
				    } 
				$sllc = "SELECT subhash FROM episodios";
				if ($resllc = mysqli_query($BD, $sllc)){/*sucesso*/}else{/*erro*/}
				while($reg = mysqli_fetch_array($resllc))
				{
					if($reg['subhash'] == $Hash)
					{
						$gerhash = 1;
					}
				}
				if($gerhash == 1){}
				else{$verihash = 1;}

			}while($verihash == 0);

			if($verihash == 1)
			{
				echo $Hash;
			}
	}


	


?>