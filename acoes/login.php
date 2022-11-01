<?php
session_start();

    // print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['estEmail']) && !empty($_POST['estSenha'])){
        //acessa
        include_once('conexao.php');
        $estEmail = $_POST['estEmail'];
        $estSenha = $_POST['estSenha'];

        // print_r('estEmail: ' . $estEmail);
        // print_r('<br>');
        // print_r('estSenha: ' . $estSenha);

        $sql = "SELECT * FROM estabelecimentos WHERE estEmail = '$estEmail' AND estSenha = '$estSenha'";

        $result = $conn -> query($sql);

        // print_r($sql);
        // print_r('<br>');
        // print_r($result);

        if(mysqli_num_rows($result) < 1){
            // print_r('nao existe');
            unset($_SESSION['estEmail']);
            unset($_SESSION['estSenha']);
            header('Location: ../index.html');
        }else{
            // print_r('existe');
            $_SESSION['estEmail'] = $estEmail;
            $_SESSION['estSenha'] = $estSenha;
            header('Location: ../listarprod.php');
        }
    }else{
        //nao acessa
        header('Location: ../index.html');
    }

?>