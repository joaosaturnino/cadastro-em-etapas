<?php
    session_start();

    $id_estab = $_POST['id']; //lê campo oculto

    include_once('conexao.php');
    // $id_estab = $_GET['id_estab'];

    if(isset($_POST['update'])){
        $estId = $_GET['id_estab'];
        $estNome = $_POST['estNome'];
        $estDocumento = $_POST['estDocumento'];
        $estEndereco = $_POST['estEndereco'];
        $cid_Id = $_POST['cid_Id'];
        $estTelefone = $_POST['estTelefone'];
        $estWhatsapp = $_POST['estWhatsapp'];
        $lnk_face = $_POST['lnk_face'];
        $lnk_inst = $_POST['lnk_inst'];
        $lnk_ifood = $_POST['lnk_ifood'];
        $lnk_much = $_POST['lnk_much'];
        $lnk_aiqfome = $_POST['lnk_aiqfome'];
        $estEmail = $_POST['estEmail'];
        $estSenha = $_POST['estSenha'];
        // $id_estab = $_GET['id_estab'];

        $sqlUpdate = "UPDATE estabelecimentos SET estNome='$estNome',estDocumento='$estDocumento',estEndereco='$estEndereco',cid_Id='$cid_Id',estTelefone='$estTelefone',estWhatsapp='$estWhatsapp',lnk_face='$lnk_face',lnk_inst='$lnk_inst',lnk_ifood='$lnk_ifood',lnk_much='$lnk_much',lnk_aiqfome='$lnk_aiqfome',estEmail='$estEmail',estSenha='$estSenha'
        WHERE estId='$estId'";

        $result = $conn -> query($sqlUpdate);

        mysqli_close($conn);
        // echo $id_estab;
        header("Location: ../listarprod.php?id_estab=".$id_estab."");
    }
    

?>