<?php
    session_start();
    // print_r($_SESSION);
    if((!isset($_SESSION['estEmail']) == true) and (!isset($_SESSION['estSenha']) == true)){
        unset($_SESSION['estEmail']);
        unset($_SESSION['estSenha']);
        header('Location: index.html');
    }else{
        $logado = $_SESSION['estEmail'];
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BuscaFood®</title>
        <style type="text/css">.style1 {font-family: Verdana, Arial, Helvetica, sans-serif}</style>
    </head>

    <body>
        <?php
        echo "<h1>bem vindo <u>$logado</u></h1>";
        ?>
        <form action="<?php echo $acao; ?>" method="post" enctype="multipart/form-data">
            <!-- <p>
                <input type="hidden" name="codprod" value="<?php echo $codprod; ?>">
            </p> -->
            <table width="609" border="1" align="center">

                <tr>
                    <td width="124" bgcolor="#CCFFFF"></td>
                    <td width="469" bgcolor="#CCFFFF"><strong>CADASTRO DE PRODUTOS</strong></td>
                </tr>
                <tr>
                    <td bgcolor="#CCFFFF"><span class="style1">Produto</span>: </td>
                    <td bgcolor="#CCFFFF"><input name="proNome" size=75 value=""></td>
                </tr>
                <tr>
                    <td bgcolor="#CCFFFF"><span class="style1">Preço</span>: </td>
                    <td bgcolor="#CCFFFF"><input name="proPreco" size=10 value=""></td>
                </tr>
                <td bgcolor="#CCFFFF"><span class="style1">Tamanho</span>: </td>
                <td bgcolor="#CCFFFF"><select name="proTamanho" id="tipo-select">
                                        <option value="" selected hidden disabled>Escolha uma opção</option>
                                        <option value="inteira">Inteira</option>
                                        <option value="meia">Meia</option>
                                        <option value="pequena">Pequena</option>
                                        <option value="media">Média</option>
                                        <option value="grande">Grande</option>
                                    </select></td>
                </tr>
                
                <td bgcolor="#CCFFFF"><span class="style1">Categoria:</span></td>
                <td bgcolor="#CCFFFF"><select name="cat_Id" id="tipo-select">
                                        <option value="" selected hidden disabled>Escolha uma opção</option>
                                        <option value="1">Lanche</option>
                                        <option value="2">Hot Dog</option>
                                        <option value="3">Combo</option>
                                        <option value="4">Porção</option>
                                        <option value="5">Pizza</option>
                                    </select></td>
                </tr>
                <tr>
                    <td height="138" bgcolor="#CCFFFF"><span class="style1">Composição</span>: </td>
                    <td bgcolor="#CCFFFF"><textarea name="proDescrição" cols="50" rows="8"></textarea></td>
                </tr>
                <tr>
                    <td bgcolor="#CCFFFF"><span class="style1">Foto:</span></td>
                    <td bgcolor="#CCFFFF"><input name="foto" type="file" size=65></td>
                </tr>
                <tr>
                    <td bgcolor="#CCFFFF"></td>
                    <td bgcolor="#CCFFFF"><input type="submit" value="Cadastrar"></td>
                </tr>
                <tr>
                    <td bgcolor="#CCFFFF"></td>
                    <td bgcolor="#CCFFFF"><?php if(!empty($_REQUEST["msg"])){$msg = $_REQUEST["msg"]; echo $msg;} else{echo "";} ?></td>
                </tr>
            </table>
        </form>
        <a href="acoes/logout.php">Sair</a>
    </body>
</html>