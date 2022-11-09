<?php
    $id_estab = $_GET['id_estab'];
    if(!empty($_GET['id_prod'])){
        include_once('conexao.php');

        $id_prod = $_GET['id_prod'];

        $sqlSelect = "SELECT * FROM produtos WHERE proId=$id_prod";

        $result = $conn -> query($sqlSelect);

        if($result -> num_rows >0){
            while($user_data = mysqli_fetch_assoc($result)){
               $sqlDelete = "DELETE * FROM produtos WHERE proId=$id_prod";
               $resultDelete = $conn -> query($sqlDelete);
            }
            // print_r($proNome);
            
        }else{
            header('Location: listar.php');
        }
    }
?>