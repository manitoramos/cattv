<?php
	
	if($_FILES["sub"]["error"] == 0)//upload foi feito com successo
	{
		$perms= array('application/octet-stream');

		// Verifica o tipo de arquivo enviado
	    if (array_search($_FILES["sub"]["type"], $perms) === false) {
	      echo 'invalido';
	    // Não houveram erros, move o arquivo
	    } else {
	      $pasta = 'subs/';
	      $upload = move_uploaded_file($_FILES['sub']['tmp_name'], $pasta . $_POST['subname'] . ".srt");
	      echo "moved";
	      //$_POST['subname']
	    }
	}
	else//upload nao foi bem sucedido
	{
		echo "erro/" . $_FILES["sub"]["error"];
	}


	//echo $_FILES["sub"]["type"];


?>