<?php
    session_start();

    if(isset($_POST['submit']) && !empty($_POST['estEmail']) && !empty($_POST['estSenha'])){
         
        include_once('conexao.php');
        $estEmail = $_POST['estEmail'];
        $estSenha = $_POST['estSenha'];

        $sql = "SELECT * FROM estabelecimentos WHERE estEmail = '$estEmail' AND estSenha = '$estSenha'";
        $res = mysqli_query($conn, $sql);
                
        $resultado = mysqli_fetch_array($res);

        if(mysqli_num_rows($res) < 1){
                
            unset($_SESSION['estEmail']);
            unset($_SESSION['estSenha']);
            header('Location: ../index.html');
        }else{
               
            $_SESSION['id_estab'] = $resultado['estId'];
            $_SESSION['estEmail'] = $estEmail;
            $_SESSION['estSenha'] = $estSenha;
            header('Location: ../listarprod.php?id_estab='.$resultado['estId'].'');
        }
        
    }else{
            
        header('Location: ../index.html');
    }
?>