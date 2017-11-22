<?php

 include("assets/bd/bd.php");
 /* read.php
 Use a função UTF8_ENCODE para os acentos caso seja necessário pela encode do servidor */
 //echo "aqui";
 if(isset($_GET['tp'])){
	  //echo "aqui";
      $filename=$_GET['tp'];
      //$path=$_SERVER['DOCUMENT_ROOT'].'/'.$filename;
	  //echo $path;
      if(file_exists("assets/inserir/" . $filename)){
		  /*echo "aqui";
           header('Content-Type: text/plain');
           //header('Content-Disposition: attachment; filename='.$filename);  <-- DOWNLOAD FILE
           header('Content-Length: ' . filesize("subs/" . $filename));
           header('Expires: 0');
           header('Cache-Control: must-revalidate');
           header('Pragma: public');

           ob_clean();
           flush();
           readfile(utf8_encode("subs/" . $filename));
		   */
		   
			//header('Content-Type: text/plain');
			//header('Content-Disposition: attachment; filename='.$filename);  <-- DOWNLOAD FILE
			header('Content-Length: ' . filesize("assets/inserir/" . $filename) . ";charset=UTF-8");
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');

			ob_clean();
			//armazena o que for impresso por readfile
			ob_start();

			readfile(utf8_encode("assets/inserir/" . $filename));

			//obtem o que foi impresso por readfile e faz o encode
			//echo utf8_encode(ob_get_clean());
			
			$allthings = ob_get_clean();
			
			$partes = explode("]", $allthings);
			
			/*echo $partes[0];
			echo "<br>";
			echo $partes[1];
			echo "<br>";
			echo $partes[2];
			echo "<br>";
			echo $partes[3];
			echo "<br>";
			echo $partes[4];
			echo "<br>";
			echo $partes[5];
			echo "<br>";
			echo $partes[6];
			echo "<hr>";*/
			
			$getmaxep = explode("**", $partes[1]);
			$e = 0;
			foreach ($getmaxep as $max){
				$e++;//saber o numero de episodios da serie que esta a inserir
			}
			
			$i = 0;
			echo "Temporada ". $partes[0];//temporada
			$season = $partes[0];
			$imbd = "tt0460681";
			echo "<br>";
			while($i < $e){
				//echo $partes[0];
				//echo "<br>";
				//foreach ($partes as $value){
					//$result = explode("**", $partes[0]);
					
					$result2 = explode("**", $partes[1]);//episodios
					$result3 = explode("**", $partes[2]);//nome dos episodios
					$result4 = explode("**", $partes[3]);//descrição
					$result5 = explode("**", $partes[4]);//imbd rating
					$result6 = explode("**", $partes[5]);//openload
					$result7 = explode("**", $partes[6]);//streamango
					/*
					echo $result2[$i];echo "<br>";
					echo $result3[$i];echo "<br>";
					echo $result4[$i];echo "<br>";
					echo $result5[$i];echo "<br>";
					echo $result6[$i];echo "<br>";
					echo $result7[$i];
					echo "<br>";echo "<br>";*/
					
					$ep = $result2[$i];
					$openload = str_replace("\r\n", "", $result6[$i]);//tirar a quebra de linha se existir
					$streamango = str_replace("\r\n", "", $result7[$i]);//tirar a quebra de linha se existir
					if($i == 0){//so as primeiras linha é que costuman ter esse problema
						$epres = str_replace("\r\n", "", $result2[$i]);//tirar a quebra de linha
						$desc = str_replace("\r\n", "", $result4[$i]);//tirar a quebra de linha
						$imbdrat = str_replace("\r\n", "", $result5[$i]);//tirar a quebra de linha
						
					}
					else{
						$epres = $result2[$i];
						$desc = $result4[$i];
						$imbdrat = $result5[$i];
					}
					
					//preg_replace('/\s/','',$result6[$i]);
					
					
					$select = "SELECT * FROM episodios WHERE season='{$season}' AND episodio='{$ep}' AND imbd='{$imbd}'";
					$res = mysqli_query($BD,$select);
					
					if(mysqli_num_rows($res) > 0){
						echo $ep . " episode is already on the website<br>";
					}
					else{
						$sql = 'INSERT INTO episodios (season, imbd, episodio, titulo, sinopse, pontuacao, openload,streamango)
						VALUES ("'.$season.'", "'.$imbd.'", "'.$epres.'", "'.$result3[$i].'", "'.$desc.'", "'.$imbdrat.'", "'.$openload.'", "'.$streamango.'")';

						if ($BD->query($sql) === TRUE) {
							echo $i+1 . "New record created successfully<br>";
						} else {
							echo "Error: " . $sql . "<br>" . $BD->error;
						}
					}
					
					/*
					$content = $result2[$i] . "\r\n" . $result3[$i] . "\r\n" . $result4[$i] . "\r\n" . $result5[$i] . "\r\n" . $result6[$i] . "\r\n" . $result7[$i];
					$fp = fopen("assets/inserir/teste/troll".$i.".txt","wb");
					fwrite($fp,$content,strlen($content));
					fclose($fp);
					*/
					
					
					
					/*foreach ($result as $value2){
						$result[$i];
						echo "<br>";
					}*/
					$i++;
					//if($i == "22"){break;}
				//}
				//if($i == "22"){break;}
			}
      }
 }
 else if(isset($_POST['inseason'])){
	 
			if($_POST['imbd'] == "")
			{
				echo "error1";
			}
			else if($_POST['inseason'] == "")
			{
				echo "error2";
			}
			else
			{
			
			$imbd = $_POST['imbd'];
			//select ao titulo da serie para fazer display
			$SQL88 = "SELECT * FROM series WHERE imbd='{$imbd}'";
			$res88 = mysqli_query($BD,$SQL88);
			$reg88 = mysqli_fetch_array($res88);
			
			$allthings = $_POST['inseason'];
	 
			$partes = explode("]", $allthings);
			
			
			$getmaxep = explode("**", $partes[1]);
			$e = 0;
			foreach ($getmaxep as $max){
				$e++;//saber o numero de episodios da serie que esta a inserir
			}
			
			$i = 0;
			//echo "{$imbd}\n";
			//echo "{$reg88['titulo']}\n";
			echo "Temporada ". $partes[0] . " [{$imbd}]". " [{$reg88['titulo']}]";//temporada
			$season = $partes[0];
			
			echo "\n";
			//echo $_POST['inseason'];
			
			//echo "<script>console.log( 'Debug Objects: " . $_POST['inseason'] . "' );</script>";
			
			
			while($i < $e){
				//echo $partes[0];
				//echo "<br>";
				//foreach ($partes as $value){
					//$result = explode("**", $partes[0]);
					
					$result2 = explode("**", $partes[1]);//episodios
					$result3 = explode("**", $partes[2]);//nome dos episodios
					$result4 = explode("**", $partes[3]);//descrição
					$result5 = explode("**", $partes[4]);//imbd rating
					$result6 = explode("**", $partes[5]);//openload
					$result7 = explode("**", $partes[6]);//streamango
					
					/////////////////////////////////////////////////////////////////////////////
					/////////////////////////////////////////////////////////////////////////////
					
					$ep = $result2[$i];
					//$openload = str_replace("\r\n", "", $result6[$i]);//tirar a quebra de linha se existir
					//$streamango = str_replace("\r\n", "", $result7[$i]);//tirar a quebra de linha se existir
					$openload = preg_replace('/\s/','',$result6[$i]);
					$streamango = preg_replace('/\s/','',$result7[$i]);

					#$openload = mysqli_real_escape_string($BD,$openload2);
					#$streamango = mysqli_real_escape_string($BD,$streamango2);

					if($i == 0){//so as primeiras linha é que costuman ter esse problema
						$epres2 = preg_replace('/\s/','',$result2[$i]);
						$titulo2 = preg_replace('/\s/','',$result3[$i]);
						$desc2 = preg_replace('/\s/','',$result4[$i]);
						$imbdrat2 = preg_replace('/\s/','',$result5[$i]);
						//remove os caracters especias para nao bugar ao inserir
						$epres = mysqli_real_escape_string($BD,$epres2);
						$titulo = mysqli_real_escape_string($BD,$titulo2);
						$desc = mysqli_real_escape_string($BD,$desc2);
						$imbdrat = mysqli_real_escape_string($BD,$imbdrat2);
						
					}
					else{
						$epres2 = $result2[$i];
						$titulo2 = $result3[$i];
						$desc2 = $result4[$i];
						$imbdrat2 = $result5[$i];
						//remove os caracters especias para nao bugar ao inserir
						$epres = mysqli_real_escape_string($BD,$epres2);
						$titulo = mysqli_real_escape_string($BD,$titulo2);
						$desc = mysqli_real_escape_string($BD,$desc2);
						$imbdrat = mysqli_real_escape_string($BD,$imbdrat2);
					}
					
					//preg_replace('/\s/','',$result6[$i]);
					
					
					$select = "SELECT * FROM episodios WHERE season='{$season}' AND episodio='{$ep}' AND imbd='{$imbd}'";
					$res = mysqli_query($BD,$select);
					
					if(mysqli_num_rows($res) > 0){
						echo $ep . " episode is already on the website\n";
					}
					else{
						$sql = 'INSERT INTO episodios (season, imbd, episodio, titulo, sinopse, pontuacao, openload,streamango)
						VALUES ("'.$season.'", "'.$imbd.'", "'.$epres.'", "'.$titulo.'", "'.$desc.'", "'.$imbdrat.'", "'.$openload.'", "'.$streamango.'")';

						#$escaped_item = mysqli_real_escape_string($BD,$sql);	

						if ($BD->query($sql) === TRUE) {
							echo $i+1 . "New record created successfully\n";
						} else {
							echo "Error: " . $sql . "<br>" . $BD->error;
						}
					}
					
					$i++;
				}
			}
 }
 	#$item = "Zak's Laptop";
	#$escaped_item = mysqli_real_escape_string($BD,$item);
	#printf("Escaped string: %s\n", $escaped_item);

 ?>