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
        $res = mysqli_query($conn, $sql);
             
		$resultado = mysqli_fetch_array($res);

        // print_r($sql);
        // print_r('<br>');
        // print_r($result);

        if(mysqli_num_rows($res) < 1){
            // print_r('nao existe');
            unset($_SESSION['estEmail']);
            unset($_SESSION['estSenha']);
            header('Location: ../index.html');
        }else{
            // print_r('existe');
            $_SESSION['id_estab'] = $resultado['estId'];
            $_SESSION['estEmail'] = $estEmail;
            $_SESSION['estSenha'] = $estSenha;
            header('Location: ../listarprod.php?id_estab='.$resultado['estId'].'');
        }
    }else{
        //nao acessa
        header('Location: ../index.html');
    }
    mysqli_close($conn);

?>