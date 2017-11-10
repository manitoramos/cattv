<html>
<head>
	<link rel='shortcut icon' type='image/x-icon' href='../favicon.ico'/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
</head>
<body>
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
			echo $partes[0];//temporada
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
					
					
					$sql = 'INSERT INTO episodios (season, imbd, episodio, titulo, sinopse, pontuacao, openload,streamango)
					VALUES ("'.$season.'", "'.$imbd.'", "'.$result2[$i].'", "'.$result3[$i].'", "'.$result4[$i].'", "'.$result5[$i].'", "'.$result6[$i].'", "'.$result7[$i].'")';

					if ($BD->query($sql) === TRUE) {
						echo $i+1 . "New record created successfully<br>";
					} else {
						echo "Error: " . $sql . "<br>" . $BD->error;
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
 ?>
 </body>
 </html>