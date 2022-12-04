<?php
  session_start();
  $id_estab = $_GET['id_estab'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/cadprod.css">
    <title>Cadastro Produto BuscaFood®</title>
</head>
<body>
<header class="header">
      <!-- <div>
          <a href="../index.html" class="logo">
            <img src="./images/Logo.svg" alt="">
          </a>
      </div> -->
      <div id="logout" >
        <?php echo '<a href="listarprod.php?id_estab='.$id_estab.'">Cancelar</a>'; ?>
      </div>
    </header>
    <div class="container">
        <div class="form-image">
            <img src="./images/Logo.svg">
        </div>  
        <div class="form">
        <form action="./acoes/cadastropro.php?id_estab=<?php echo $id_estab?>" method="post" enctype="multipart/form-data">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastro de Produtos</h1>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="produto">Produto</label>
                        <input id="proNome" type="text" name="proNome" required>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="preco">Preço</label>
                        <input id="proPreco" type="number" step=".01" name="proPreco" required>
                    </div>
                </div>

                <div class="radio-inputs">
                    <div class="radio-title">
                        <h6>Tamanho:</h6>
                    </div>

                    <div class="radio-group">
                       <div class="radio-input">
                            <input type="radio" id="pequena" name="tam_Id" value="1" required>
                            <label for="pequena">Pequena</label>
                       </div>

                       <div class="radio-input">
                            <input type="radio" id="media" name="tam_Id" value="2" required>
                            <label for="pequena">Média</label>
                        </div>

                        <div class="radio-input">
                            <input type="radio" id="grande" name="tam_Id" value="3" required>
                            <label for="pequena">Grande</label>
                        </div>
                    </div>

                    <div class="radio-inputs">
                        <div class="radio-title">
                            <h6>Categoria:</h6>
                        </div>
    
                        <div class="radio-group">
                           <div class="radio-input">
                                <input type="radio" id="lanche" name="cat_Id" value="1" required>
                                <label for="lanche">Lanche</label>
                           </div>
    
                           <div class="radio-input">
                                <input type="radio" id="hot-dog" name="cat_Id" value="2" required>
                                <label for="hot-dog">Hot-Dog</label>
                            </div>
    
                            <div class="radio-input">
                                <input type="radio" id="porcao" name="cat_Id" value="3" required>
                                <label for="porcao">Porção</label>
                            </div>

                            <div class="radio-input">
                                <input type="radio" id="pizza" name="cat_Id" value="4" required>
                                <label for="pizza">Pizza</label>
                            </div>
                        </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="descricao">Descrição</label>
                        <input id="proDescricao" type="text" name="proDescricao" require>
                    </div>
                </div>

                <div class="input-group">
                    <div class="inputBox">
                        <label>Foto:</label>
                        <input type="file" name="proImagem" id="proImagem" class="inputProd">
                      </div>
                </div>

                <input type="submit" name="submit" id="submit" value="Cadastrar">
            </form>
        </div>
    </div>
</body>
</html>