<?php
    session_start();
                    //verifica o email e senha
    if(isset($_POST['submit']) && !empty($_POST['estEmail']) && !empty($_POST['estSenha'])){
         
        include_once('conexao.php');
        $estEmail = $_POST['estEmail'];
        $estSenha = $_POST['estSenha'];
                    //apos verificar senha e email faz-se o select no banco
        $sql = "SELECT * FROM estabelecimentos WHERE estEmail = '$estEmail' AND estSenha = MD5('$estSenha')";
        $res = mysqli_query($conn, $sql);
                
        $resultado = mysqli_fetch_array($res);

        if(mysqli_num_rows($res) < 1){
                //caso nao tenha se encerra a sessao e volta ao login
            unset($_SESSION['estEmail']);
            unset($_SESSION['estSenha']);
            header('Location: ../index.html');
        }
        else{
                    //caso exista, inicia a sessao e  redireciona para tela de listagem
            $_SESSION['id_estab'] = $resultado['estId'];
            $_SESSION['estEmail'] = $estEmail;
            $_SESSION['estSenha'] = $estSenha;
            header('Location: ../listarprod.php?id_estab='.$resultado['estId'].'');
        }
        
    }
    else{
            
        header('Location: ../index.html');//caso alguma divergencia seja encontrada, redireciona para  o login
    }
?>