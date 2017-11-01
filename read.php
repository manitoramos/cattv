<?php
 /* read.php
 Use a função UTF8_ENCODE para os acentos caso seja necessário pela encode do servidor */
 //echo "aqui";
 if(isset($_GET['rf'])){
	  //echo "aqui";
      $filename=$_GET['rf'];
      //$path=$_SERVER['DOCUMENT_ROOT'].'/'.$filename;
	  //echo $path;
      if(file_exists("assets/legendas/" . $filename)){
		  //echo "aqui";
           header('Content-Type: text/plain');
           //header('Content-Disposition: attachment; filename='.$filename);  <-- DOWNLOAD FILE
           header('Content-Length: ' . filesize("assets/legendas/" . $filename));
           header('Expires: 0');
           header('Cache-Control: must-revalidate');
           header('Pragma: public');

           ob_clean();
           flush();
           readfile("assets/legendas/" . $filename);
      }
 }
 ?>