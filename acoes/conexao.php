<?php
$host = '127.0.0.1';
$usuario = 'root';
$senha = '';
$bd = 'buscateste3';

// $host = '10.67.22.216';
// $usuario = 's221_tcc_g1_us';
// $senha = 'delv220809';
// $bd = 's221_tcc_g1_bd';

    $conn = @mysqli_connect ($host, $usuario, $senha, $bd);

    if($conn)
    {
        $banco = @mysqli_select_db($conn, $bd);        
    }
    else
    {
        
        print('Erro! Conexão não realizada!');
    }

?>