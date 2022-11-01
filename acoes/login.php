<?php
    
    // print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['estEmail']) && !empty($_POST['estSenha'])){
        //acessa
        include_once('conexao.php');
        $estEmail = $_POST['estEmail'];
        $estSenha= $_POST['estSenha'];

        print_r('estEmail: ' . $estEmail);
        print
    }else{
        header('Location: ../login.html');
    }
?>