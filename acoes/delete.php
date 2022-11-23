<?php
  session_start();
  $id_estab = $_GET['id'];

     if(!empty($_GET['id_prod'])){

        include_once('conexao.php');

        $id = $_GET['id_prod'];

        $sqlSelect = "SELECT * FROM produtos WHERE proId=$id";
      
        $result = $conn -> query($sqlSelect);

        // print_r($result);
        if($result -> num_rows > 0){
            $sqlDelete = "DELETE FROM produtos WHERE proId=$id";
            $resultDelete = $conn -> query($sqlDelete);
        }
      }

      mysqli_close($conn);

      header('Location: ../listarprod.php?id_estab_delete='.$id_estab.'');
   
   
?>