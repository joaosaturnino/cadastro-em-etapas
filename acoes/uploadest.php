<?php

	if( empty($_FILES['estLogo']) ){
		echo "Parou aqui"; //se nao houver fotos na interface
		$estLogo = null;
	}else{ 
		$estLogo = $_FILES['estLogo']; //sen�o, l� a foto e joga na variavel
		}

	if(!empty($estLogo["tmp_name"])) {
		$nome_arquivo = "logo".$codest.".jpg"; //o nome do arquivo(prod+codproduto.jpg)
		$sql = "UPDATE estabelecimentos SET estLogo = '".$nome_arquivo. "' WHERE estId=".$codest;
		$consulta = mysqli_query($conn,$sql); //executa o sql
		
		if (is_uploaded_file($estLogo["tmp_name"])){ //faz o upload, se ok
			move_uploaded_file($estLogo["tmp_name"],"../images/estabelecimentos/".$nome_arquivo); //move para a pasta fotos
		}
		else{
			echo "erro ao fazer upload.<br>";
		}
	}
?>
