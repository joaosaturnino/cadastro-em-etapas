<?php
  session_start();
  $id_estab = $_GET['id'];

  if(!empty($_GET['id_prod'])){

    include_once('conexao.php');

    $id = $_GET['id_prod'];
            //select para verificar se o produto esta cadastrado
    $sqlSelect = "SELECT * FROM produtos WHERE proId=$id";
        
    $result = $conn -> query($sqlSelect);
          //caso cadastrado, aqui fara a exclusao dele
    if($result -> num_rows > 0){
      $sqlDelete = "DELETE FROM produtos WHERE proId=$id";
      $resultDelete = $conn -> query($sqlDelete);
    }
  }

  header('Location: ../listarprod.php?id_estab_delete='.$id_estab.'');//redireciona para a tela de listagem
   
   
?>