<?php

    include_once('conexao.php');

    if(isset($_POST['update'])){

        $id = $_GET['id_prod'];
        $proNome = $_POST['proNome'];
        $proPreco = $_POST['proPreco'];
        $tam_Id = $_POST['tam_Id'];
        $cat_Id = $_POST['cat_Id'];
        $proDescricao = $_POST['proDescricao'];

        $sqlUpdate = "UPDATE produtos SET proNome='$proNome',proPreco='$proPreco',tam_Id='$tam_Id',cat_Id='$cat_Id',proDescricao='$proDescricao' WHERE proId='$id'";

        $result = $conn -> query($sqlUpdate);
        print_r($result);
    }


    header('Location: ../listarprod.php');
?>