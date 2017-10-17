<?php
	//if ($_SERVER['SERVER_NAME'] == "localhost")
	//{
		$server = "localhost";
		$user = "root";
		//$senha = "";
		$bd = "cattv";
												
		$LIGA =@mysql_connect("$server","$user","") or die ("servidor nao esta a responder!");
										
		$db =@mysql_select_db($bd,$LIGA) or die ("Nao foi possivel conectar-se ao banco de dados!");
	/*}
	else if ($_SERVER['SERVER_NAME'] == "broteronews.pe.hu")
	{
		$server = "mysql.hostinger.pt";
		$user = "u371385856_root";
		$senha = "manitoalex";
		$bd = "u371385856_news";
												
		$LIGA =@mysql_connect("$server","$user","$senha") or die ("servidor nao esta a responder!");
										
		$db =@mysql_select_db($bd,$LIGA) or die ("Nao foi possivel conectar-se ao banco de dados!");
	}*/
?>