<?php
	session_start();
	$codest = $_GET['id_estab'];

	empty($_REQUEST["proNome"])         ? $proNome = ""         : $proNome = $_REQUEST["proNome"];
	empty($_REQUEST["proPreco"])        ? $proPreco = ""        : $proPreco = str_replace(",",".",$_REQUEST["proPreco"]);
	empty($_REQUEST["tam_Id"])          ? $tam_Id = ""          : $tam_Id = $_REQUEST["tam_Id"];
	empty($_REQUEST["cat_Id"])          ? $cat_Id = ""          : $cat_Id = $_REQUEST["cat_Id"];
	empty($_REQUEST["proDescricao"])    ? $proDescricao = ""    : $proDescricao = $_REQUEST["proDescricao"];
	empty($_FILES["proImagem"])         ? $proImagem = ""       : $proImagem = $_FILES["proImagem"];

	include("conexao.php");
					//inserção dos dados vindo do formulario
	$sql = "Insert Into produtos(proNome,proPreco,tam_Id,cat_Id,proDescricao,proAtualizacao,est_Id)".
	"values ('".$proNome. "','" .$proPreco. "','".$tam_Id."','".$cat_Id."','".$proDescricao."',
	CURDATE(),'".$codest."')";
			
	$consulta = mysqli_query($conn, $sql);
	$codprod = mysqli_insert_id($conn); //pega o campo chave da tabela (vai ser usado em upload)
	include("uploadprod.php"); //neste ponto chama o arquivo para fazer o upload da foto


	header("location:../teste.php?id_estab=$codest"); //redireciona para um novo cadastro de produto
?>