<?php
    session_start();

    $id_estab = $_POST['id']; //lê campo oculto

    include_once('conexao.php');
    // $id_estab = $_GET['id_estab'];

    if(isset($_POST['update'])){
        $proId = $_GET['id_prod'];
        $proNome = $_POST['proNome'];
        $proPreco = $_POST['proPreco'];
        $tam_Id = $_POST['tam_Id'];
        $cat_Id = $_POST['cat_Id'];
        $proDescricao = $_POST['proDescricao'];
        // $id_estab = $_GET['id_estab'];

        $sqlUpdate = "UPDATE produtos SET proNome='$proNome',proPreco='$proPreco',tam_Id='$tam_Id',cat_Id='$cat_Id',proDescricao='$proDescricao',proAtualizacao=CURDATE()
        WHERE proId='$proId'";

        $result = $conn -> query($sqlUpdate);

        // echo $id_estab;
        header("Location: ../listarprod.php?id_estab=".$id_estab."");
    }
    

?>