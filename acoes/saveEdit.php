<?php

    include_once('conexao.php');

    if(isset($_POST['update'])){

        // $proId = $_POST['proId'];
        $proNome = $_POST['proNome'];
        $proPreco = $_POST['proPreco'];
        $tam_Id = $_POST['tam_Id'];
        $cat_Id = $_POST['cat_Id'];
        $proDescricao = $_POST['proDescricao'];

        $sqlInsert = "UPDATE produtos SET proNome='$proNome',proPreco='$proPreco',tam_Id='$tam_Id',cat_Id='$cat_Id',proDescricao='$proDescricao' WHERE proId='$proId'";

        $result = $conn -> query($sqlInsert);
        print_r($result);
    }


    header('Location: ../listarprod.php');
?>