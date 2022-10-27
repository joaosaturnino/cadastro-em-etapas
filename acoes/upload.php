<?php
if( empty($_FILES['foto']) ){ //se nao houver fotos na interface
$foto = null;
}else{ 
$foto = $_FILES['foto']; //senão, lê a foto e joga na variavel
}
if(!empty($foto["tmp_name"])) {
$nome_arquivo = "prod".$codprod.".jpg"; //o nome do arquivo(prod+codproduto.jpg)
$sql = "UPDATE produto2 SET Foto = '".$nome_arquivo. "' WHERE CodProd=".$codprod;
$consulta = mysqli_query($conn,$sql); //executa o sql
if (is_uploaded_file($foto["tmp_name"])){ //faz o upload, se ok
move_uploaded_file($foto["tmp_name"],"./fotos/".$nome_arquivo); //move para a pasta fotos
}
else{
echo "erro ao fazer upload.<br>";
}
}
?>
