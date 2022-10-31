<?php
    // print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['estEmail']) && !empty($_POST['estSenha'])){
        include_once('conexao.php');
        $estEmail = $_POST['estEmail'];
        $estSenha = $_POST['estSenha'];

        // print_r('estEmail: ' . $estEmail);
        // print_r('<br>');
        // print_r('estSenha: ' . $estSenha);

        $sql = "SELECT * FROM estabelecimentos WHERE estEmail = '$estEmail' AND estSenha = '$estSenha'";

        $result = $conexao -> query($sql);

        // print_r($sql);
        // print_r($result);
    }else{
        header('Location: ./login.html');
    }
?>