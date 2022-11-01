<?php
    session_start();
    include_once('./acoes/conection.php');
    // print_r($_SESSION);
    if((!isset($_SESSION['estEmail']) == true) and (!isset($_SESSION['estSenha']) == true)){
        unset($_SESSION['estEmail']);
        unset($_SESSION['estSenha']);
        header('Location: index.html');
    }else{
        $logado = $_SESSION['estEmail'];

        $sql = "SELECT * FROM produtos ORDER BY proId ASC";

        $result = $conn -> query($sql);

        // print_r($result);
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BuscaFood®</title>
    <link rel="stylesheet" href="./css/listarprod.css">
</head>
<body>
    <div class="m-5">
        <table class="table text-black table-bg">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Estabelecimento</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($user_data = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$user_data['proId']."</td>";
                        echo "<td>".$user_data['proNome']."</td>";
                        echo "<td>".$user_data['cat_Id']."</td>";
                        echo "<td>".$user_data['est_Id']."</td>";
                        echo "<td>
                            <a class='btn btn-sm btn-primary' href='editprod.php?id=$user_data[proId]'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                            <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                            <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                            </svg>
                            </a>
                        </td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>