<?php
	session_start();

	if( empty($_FILES['proImagem']) ){
	 //se nao houver fotos na interface
		$proImagem = null;
	}
	else{ 
		$proImagem = $_FILES['proImagem']; //sennao, pega a foto e joga na variavel
	}

	if(!empty($proImagem["tmp_name"])) {
		$nome_arquivo = "prod".$codprod.".jpg"; //o nome do arquivo(prod+codproduto.jpg)
		$sql = "UPDATE produtos SET proImagem = '".$nome_arquivo. "' WHERE proId=".$codprod;
		$consulta = mysqli_query($conn, $sql); //executa o sql
			
		if(is_uploaded_file($proImagem["tmp_name"])){ //faz o upload, se ok
			move_uploaded_file($proImagem["tmp_name"],"../images/produtos/".$nome_arquivo); //move para a pasta fotos
		}
		else{
			echo "erro ao fazer upload.<br>";
		}
	}

	
?>
