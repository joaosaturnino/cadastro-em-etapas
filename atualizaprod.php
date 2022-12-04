<?php
  session_start();
  $id = $_GET['id'];
  if(!empty($_GET['id_prod'])){

    include_once('./acoes/conexao.php');

    $id_prod = $_GET['id_prod'];

    $sqlSelect = "SELECT * FROM produtos WHERE proId=$id_prod";

    $result = $conn -> query($sqlSelect);

    if($result -> num_rows >0){
      while($user_data = mysqli_fetch_assoc($result)){
        $proNome = $user_data['proNome'];
        $proPreco = $user_data['proPreco'];
        $tam_Id = $user_data['tam_Id'];
        $cat_Id = $user_data['cat_Id'];
        $proDescricao = $user_data['proDescricao'];

      }
    }else{
    header('Location: listar.php');
    }
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/teste.css">
    <title>BuscaFood®</title>
</head>
<body>
    <header class="header">
        <!-- <div>
            <a href="../index.html" class="logo">
              <img src="./images/Logo.svg" alt="">
            </a>
        </div> -->
        <div id="logout" >
          <?php echo '<a href="listarprod.php?id_estab='.$id.'">Cancelar</a>'; ?>
        </div>
      </header>
    <div class="container">
        <div class="form-image">
            <img src="./images/Logo.svg">
        </div>  
        <div class="form">
        <form action="./acoes/saveEdit.php?id_prod=<?php echo $id_prod?>" method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>Atualização de Produtos</h1>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="produto">Produto</label>
                        <input id="proNome" type="text" name="proNome" value="<?php echo $proNome ?>" required>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="preco">Preço</label>
                        <input id="proPreco" type="number" step=".01" name="proPreco"value="<?php echo $proPreco ?>" required>
                    </div>
                </div>

                <div class="radio-inputs">
                    <div class="radio-title">
                        <h6>Tamanho:</h6>
                    </div>

                    <div class="radio-group">
                       <div class="radio-input">
                            <input type="radio" id="pequena" name="tam_Id" value="1" <?php echo ($tam_Id == '1') ? 'checked' : ''?> required>
                            <label for="pequena">Pequena</label>
                       </div>

                       <div class="radio-input">
                            <input type="radio" id="media" name="tam_Id" value="2" <?php echo ($tam_Id == '2') ? 'checked' : ''?> required>
                            <label for="pequena">Média</label>
                        </div>

                        <div class="radio-input">
                            <input type="radio" id="grande" name="tam_Id" value="3" <?php echo ($tam_Id == '3') ? 'checked' : ''?> required>
                            <label for="pequena">Grande</label>
                        </div>
                    </div>

                    <div class="radio-inputs">
                        <div class="radio-title">
                            <h6>Categoria:</h6>
                        </div>
    
                        <div class="radio-group">
                           <div class="radio-input">
                                <input type="radio" id="lanche" name="cat_Id" value="1" <?php echo ($cat_Id == '1') ? 'checked' : ''?> required>
                                <label for="lanche">Lanche</label>
                           </div>
    
                           <div class="radio-input">
                                <input type="radio" id="hot-dog" name="cat_Id" value="2" <?php echo ($cat_Id== '2') ? 'checked' : ''?> required>
                                <label for="hot-dog">Hot-Dog</label>
                            </div>
    
                            <div class="radio-input">
                                <input type="radio" id="porcao" name="cat_Id" value="3" <?php echo ($cat_Id == '3') ? 'checked' : ''?> required>
                                <label for="porcao">Porção</label>
                            </div>

                            <div class="radio-input">
                                <input type="radio" id="pizza" name="cat_Id" value="4" <?php echo ($cat_Id == '4') ? 'checked' : ''?> required>
                                <label for="pizza">Pizza</label>
                            </div>
                        </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="descricao">Descrição</label>
                        <input id="proDescricao" type="text" name="proDescricao" value="<?php echo $proDescricao ?>" require >
                    </div>
                </div>

                <input type="hidden" name="id" value="<?php echo $id?>">
                <input type="submit" name="update" id="submit" value="Atualizar">
            </form>
        </div>
    </div>
</body>
</html>