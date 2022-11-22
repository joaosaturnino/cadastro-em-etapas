<?php
    session_start();
    include_once('./acoes/conexao.php');
    // print_r($_SESSION);
    
    if(!is_null(@$_GET['id_estab'])){
        $id_estab = $_GET['id_estab'];
    }
    else if(!is_null(@$_GET['id_estab_delete'])){
        $id_estab = $_GET['id_estab_delete'];
    }

    // echo '<script>alert("'.$id_estab.'")</script>';
    // $id_estab_delete = @$_GET['id_estab_delete'];//parametro qdo retorna do delete
    

    if((!isset($_SESSION['estEmail']) == true) and (!isset($_SESSION['estSenha']) == true)){
        unset($_SESSION['estEmail']);
        unset($_SESSION['estSenha']);
        header('Location: index.html');
    }else{
             
        if(!empty($_GET['search'])){
            $data = $_GET['search'];

            $sql = "SELECT * FROM produtos p
                INNER JOIN estabelecimentos e
                ON e.estId = p.est_Id
                INNER JOIN tamanhos t
                ON t.tamId = p.tam_Id
                INNER JOIN categorias ct
                ON ct.catId = p.cat_Id
                WHERE p.est_Id = '$id_estab'  
                AND (p.proNome LIKE '%$data%' or p.proDescricao LIKE '%$data%') 
                ORDER BY proNome ASC, cat_Id, tam_Id asc";
            //   echo $sql;
            // echo "<br>";
            // echo "contem algo, pesquisar";
        }
        else{
            // echo "não temos nada, trazer todos os registros";
            $sql = "SELECT * FROM produtos p
                    INNER JOIN estabelecimentos e
                    ON e.estId = p.est_Id
                    INNER JOIN tamanhos t
                    ON t.tamId = p.tam_Id
                    INNER JOIN categorias ct
                    ON ct.catId = p.cat_Id
                    WHERE p.est_Id = ".$id_estab."
                    ORDER BY proNome ASC, cat_Id, tam_Id asc";
        }
        // $sql = "SELECT * FROM produtos ORDER BY proId ASC";

        $result = mysqli_query($conn, $sql);
        $campo = mysqli_fetch_array($result);

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
        <!-- importação do bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <!-- biblioteca de icones -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <!-- CSS comum -->
        <link rel="stylesheet" href="./css/listarprod.css">
        
    </head>
    <body>
        
        <header class="header">
            <div>
                <a href="../index.html" class="logo">
                    <img src="./images/Logo.svg" alt="">
                </a>
            </div>
            <div id="logout" >
                <a href="./acoes/logout.php">Logout</a>
            </div>
        </header>
        <div class="content">
            <div class="box-search">
                <input type="search" class="form-control w=25" placeholder="Pesquisar" id="pesquisar">
                <?php echo'<input type="hidden" id="estabelecimento" value="'.$id_estab.'">';  ?>
                <button onclick="searchData()" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </div>

            <div class="loja-header">
                <h1><?php echo $campo["estNome"] ?></h1>
                <img src="./images/estabelecimentos/<?php echo $campo["estLogo"] ?>" alt="">
            </div>

            <a style="display: block; width: 200px; text-decoration: none;" href="produto.php?id_estab=<?php echo $id_estab?>">
                <div id="new">
                    <i class="fa-solid fa-plus"></i> <br>
                    Adicionar Novo
                </div>
            </a>

            <div class="m-8" id="tabelaProd">
                <table class="table text-black table-bg">
                    <thead>
                        <tr>
                            <!-- <th scope="col">ID</th> -->
                            <th scope="col">Produto</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Tamanho</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Atualização</th>
                            <th scope="col">Imagem</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Excluir</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($user_data = mysqli_fetch_array($result)){
                                echo "<tr>";
                                // echo "<td id='idProd'>".$user_data['proId'].
                                   '<input type="hidden" id="produto" value="'.$user_data['proId'].'">';
                                    "</td>";
                                echo "<td class='tamanhoMax''><p>".$user_data['proNome']."</p></td>";
                                echo "<td>R$ ".$user_data['proPreco']."</td>";
                                echo "<td>".$user_data['tamNome']."</td>";
                                echo "<td>".$user_data['catNome']."</td>";
                                echo "<td class='tamanhoMax';'><p>".$user_data['proDescricao']."</p></td>";
                                echo "<td>".$user_data['proAtualizacao']."</td>";
                                echo "<td><img style='width: 100px; height: 50px;' src='./images/produtos/".$user_data['proImagem']."'></td>";
                                echo "<td>
                                    <a class='btn btn-sm btn-warning' href='atualizaprod2.php?id_prod=".$user_data['proId']."&id=".$id_estab."'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                    <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                    <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                    </svg>
                                    </a>
                                    </td>";
                                    
                                echo "<td>
                                   
                                    <a class='btn btn-sm btn-danger' id='deleteBtn' onClick='apaga(".$user_data['proId'].")'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
                                    <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z'/>
                                    </svg>
                                </td>";
                                // echo "<td>
                                // <a class='btn btn-sm btn-success' href='produto.php?id_estab=$user_data[est_Id]'>
                                //     <svg xmlns='http://www.w3.org/2000/svg' width=16' height='16' fill='curretColor' class='bi bi-plus-circle' viewBox='0 0 16 16'>
                                //         <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                //         <path d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z'/>
                                //     </svg>
                                //               </td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        </body>
        
    <script> //script do campo de busca
        var search = document.getElementById('pesquisar');
       
        var idEstab = document.getElementById('estabelecimento').value;

        search.addEventListener("keydown", function(event){
            if(event.key == "Enter"){
                searchData();
            }
        });
        
        function searchData(){
            window.location = 'listarprod.php?id_estab='+estabelecimento.value+'&search='+search.value;
        }

        function apaga(idProd){
            if (confirm("Você deseja mesmo apagar este produto?")) {
                // alert('Apagado com sucesso!')
                location.href = './acoes/delete.php?id_prod='+idProd+'&id='+idEstab
            }
        }

    

        </script>
          
</html>