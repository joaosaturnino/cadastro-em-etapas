<?php
$id_estab = $_GET['id'];

empty($_REQUEST["estNome"])         ? $estNome = ""         : $estNome = $_REQUEST["estNome"];
empty($_REQUEST["estDocumento"])    ? $estDocumento = ""    : $estDocumento = $_REQUEST["estDocumento"];
empty($_FILES["estLogo"])         	? $estLogo = ""         : $estLogo = $_FILES["estLogo"];
empty($_REQUEST["estEndereco"])     ? $estEndereco = ""     : $estEndereco = $_REQUEST["estEndereco"];
empty($_REQUEST["cid_Id"])          ? $cid_Id = ""          : $cid_Id = $_REQUEST["cid_Id"];
empty($_REQUEST["estTelefone"])     ? $estTelefone = ""     : $estTelefone = $_REQUEST["estTelefone"];
empty($_REQUEST["estWhatsapp"])     ? $estWhatsapp = ""     : $estWhatsapp = $_REQUEST["estWhatsapp"];
empty($_REQUEST["lnk_face"])        ? $lnk_face = ""        : $lnk_face = $_REQUEST["lnk_face"];
empty($_REQUEST["lnk_inst"])        ? $lnk_inst = ""        : $lnk_inst = $_REQUEST["lnk_inst"];
empty($_REQUEST["lnk_ifood"])       ? $lnk_ifood = ""       : $lnk_ifood = $_REQUEST["lnk_ifood"];
empty($_REQUEST["lnk_much"])        ? $lnk_much = ""        : $lnk_much = $_REQUEST["lnk_much"];
empty($_REQUEST["lnk_aiqfome"])     ? $lnk_aiqfome = ""     : $lnk_aiqfome = $_REQUEST["lnk_aiqfome"];
empty($_REQUEST["estEmail"])        ? $estEmail = ""        : $estEmail = $_REQUEST["estEmail"];
empty($_REQUEST["estSenha"])        ? $estSenha = ""        : $estSenha = $_REQUEST["estSenha"];

	include("conexao.php");
	$sql = "Select * from estabelecimentos where estNome = '".$estNome."'";
	$resultado = mysqli_query($conn,$sql);
	
	if (mysqli_num_rows($resultado) > 0) {
		?> <script>	alert("Estabelecimento já cadastrado"); </script> <?php 
	}
	else {
	
		$sql = "Insert Into estabelecimentos(estNome,estDocumento,estEndereco,cid_Id,estTelefone,estWhatsapp,lnk_face,lnk_inst,lnk_ifood,lnk_much,lnk_aiqfome,estEmail,estSenha) ".
		"values ('".$estNome. "','" .$estDocumento. "','".$estEndereco."','".$cid_Id."','".$estTelefone."','".$estWhatsapp."','".$lnk_face."','".$lnk_inst."','".$lnk_ifood."','".$lnk_much."','".$lnk_aiqfome."','".$estEmail."','".$estSenha."')";
		
		$consulta = mysqli_query($conn, $sql);
		$codest = mysqli_insert_id($conn); //pega o campo chave da tabela (vai ser usado em upload)
		include("uploadest.php"); //neste ponto chama o arquivo para fazer o upload da foto
	}

	mysqli_close($conn); 

	header("location:../produto.php?id_estab=$codest");
?>