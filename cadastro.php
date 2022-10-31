<?php
    session_start();

    if(isset($_SESSION["estabelecimento"]) && is_array($_SESSION["estabelecimento"])){
       $estTipo = $_SESSION["estabelecimento"][1];
       $estNome = $_SESSION["estabelecimento"][0]; 
    }else{
        echo "<script>window.location = 'login.html'</script>";
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BuscaFood® - <?php echo $estNome; ?> </title>
</head>
<body>
    <a href="./acoes/logout.php">Sair</a>
</body>
</html>