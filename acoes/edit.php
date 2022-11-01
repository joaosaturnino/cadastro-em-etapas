<?php
    session_start();
    // print_r($_SESSION);
    if((!isset($_SESSION['estEmail']) == true) and (!isset($_SESSION['estSenha']) == true)){
        unset($_SESSION['estEmail']);
        unset($_SESSION['estSenha']);
        header('Location: index.html');
    }else{
        $logado = $_SESSION['estEmail'];
			// fa�a o REQUEST (ou POST) de todos os seus campos de formulario:
			$proNome = $_REQUEST["proNome"];
			$proPreco = str_replace(",",".",$_REQUEST["proPreco"]); //troca , por . o padrao americano 
			$tam_Id   = $_REQUEST["tam_Id"];
			$cat_Id  = $_REQUEST["cat_Id"];
			$proDescricao = $_REQUEST["proDescricao"];
			$proImagem      = $_FILES["proImagem"]; //$_FILES para ler fotos
		
			if(!empty($proNome) && !empty($proPreco)) { //se descricao nem precoUnit estiverem vazios
				include("conexao.php");
				$sql= "INSERT INTO produtos(proNome, proPreco, proTamanho, cat_Id, proDescricao, proImagem) ".
						"VALUES('".$proNome."',".$proPreco.",".$proTamanho.",".$cat_Id.",'".$proDescricao."','D')";
		
				
				$consulta = mysqli_query($conn,$sql);
		
				$codprod = mysqli_insert_id($conn); //pega o campo chave da tabela (vai ser usado em upload)
				
				include("./acoes/uploadprod.php"); //neste ponto chama o arquivo para fazer o upload da foto
				
				mysqli_close($conn); //fecha a conex�o
				
				//redireciona para a pagina de cadastro de produto mandando uma mensagem
				header("location:produto.php?msg=Produto cadastrado com sucesso!");
			}
		}
	
    
?>