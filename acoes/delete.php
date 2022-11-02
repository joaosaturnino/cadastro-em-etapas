<?php

  if(!empty($_GET['id'])){

    include_once('conexao.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM produtos WHERE proId=$id";

    $result = $conn -> query($sqlSelect);

    // print_r($result);
    if($result -> num_rows > 0){

        $sqlDelete = "DELETE FROM produtos WHERE proId=$id";
        $resultDelete = $conn -> query($sqlDelete);
    }

  }

  header('Location: ../listarprod.php');
?>