<?php
		include "../bd/bd.php";

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
?>