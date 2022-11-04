<?php
$id_estab = $_GET['idestab'];

empty($_REQUEST["proNome"])         ? $proNome = ""         : $proNome = $_REQUEST["proNome"];
empty($_REQUEST["proPreco"])        ? $proPreco = ""        : $proPreco = $_REQUEST["proPreco"];
empty($_REQUEST["tam_Id"])          ? $tam_Id = ""          : $tam_Id = $_REQUEST["tam_Id"];
empty($_REQUEST["cat_Id"])          ? $cat_Id = ""          : $cat_Id = $_REQUEST["cat_Id"];
empty($_REQUEST["proDescricao"])    ? $proDescricao = ""    : $proDescricao = $_REQUEST["proDescricao"];
empty($_REQUEST["est_Id"])    		? $est_Id = ""    		: $est_Id = $_REQUEST["est_Id"];
empty($_FILES["proImagem"])         ? $proImagem = ""       : $proImagem = $_FILES["proImagem"];

	include("conexao.php");
	// $id = $_GET['id'];
	// $sql = "Select * from pro where estNome = '".$estNome."'";
	// $resultado = mysqli_query($conn,$sql);
	
	// if (mysqli_num_rows($resultado) > 0) {
		?><?php 
	// }
	// else {
	
	// 	$sql = "Insert Into estabelecimentos(estNome,estDocumento,estEndereco,cid_Id,estTelefone,estWhatsapp,lnk_face,lnk_inst,lnk_ifood,lnk_much,lnk_aiqfome,estEmail,estSenha) ".
	// 	"values ('".$estNome. "','" .$estDocumento. "','".$estEndereco."','".$cid_Id."','".$estTelefone."','".$estWhatsapp."','".$lnk_face."','".$lnk_inst."','".$lnk_ifood."','".$lnk_much."','".$lnk_aiqfome."','".$estEmail."','".$estSenha."')";
		
	// 	$consulta = mysqli_query($conn, $sql);
	// 	$codprod = mysqli_insert_id($conn); //pega o campo chave da tabela (vai ser usado em upload)
	// 	include("uploadest.php"); //neste ponto chama o arquivo para fazer o upload da foto
	// }

    $sql = "Insert Into produtos(proNome,proPreco,tam_Id,cat_Id,proDescricao, est_Id)".
	"values ('".$proNome. "','" .$proPreco. "','".$tam_Id."','".$cat_Id."','".$proDescricao."','".$est_Id."')";
		
		$consulta = mysqli_query($conn, $sql);
		$codprod = mysqli_insert_id($conn); //pega o campo chave da tabela (vai ser usado em upload)
		include("uploadprod.php"); //neste ponto chama o arquivo para fazer o upload da foto

	mysqli_close($conn); 

	header("location:../produto.php?msg=Produto cadastrado com sucesso!");
?>