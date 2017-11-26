<?php
 /* read.php
 Use a função UTF8_ENCODE para os acentos caso seja necessário pela encode do servidor */
 //echo "aqui";
 if(isset($_GET['rf'])){
	  //echo "aqui";
      $filename=$_GET['rf'];
      //$path=$_SERVER['DOCUMENT_ROOT'].'/'.$filename;
	  //echo $path;
      if(file_exists("subs/" . $filename)){
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
		   
		   header('Content-Type: text/plain');
			//header('Content-Disposition: attachment; filename='.$filename);  <-- DOWNLOAD FILE
			header('Content-Length: ' . filesize("subs/" . $filename) . ";charset=UTF-8");
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');

			//ob_clean();
			//armazena o que for impresso por readfile
			ob_start();

			readfile(utf8_encode("subs/" . $filename));

			//obtem o que foi impresso por readfile e faz o encode
			echo utf8_encode(ob_get_clean());

      }
 }
 ?>