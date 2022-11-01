<?php

  if(isset($_POST['submit'])){
    print_r($_POST['proNome']);
    print_r($_POST['proPreco']);
    print_r($_POST['proDescricao']);
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BuscaFood®</title>
  <link rel="stylesheet" href="./css/produto.css">
</head>
<body>
    <div class="box">
      <form action="produto.php" method="post">
        <fieldset>
          <legend><b>Cadastro de Produtos</b></legend>
          <br>
          <div class="inputBox">
            <input type="text" name="proNaome" id="proNome" class="inputProd" required>
            <label class="labelInput">Produto:</label>
          </div>
          <br>
          <div class="inputBox">
            <input type="text" name="proPreco" id="proPreco" class="inputProd" required>
            <label class="labelInput">Preço:</label>
          </div>
          <br>
          <p>Tamanho:</p>
          <input type="radio" id="tam_Id" name="tam_Id" value="1" required>
          <label for="pequena">Pequena</label>
          <input type="radio" id="tam_Id" name="tam_Id" value="2" required>
          <label for="media">Média</label>
          <input type="radio" id="tam_Id" name="tam_Id" value="3" required>
          <label for="grande">Grande</label>
          <br>
          <p>Categoria:</p>
          <input type="radio" id="cat_Id" name="cat_Id" value="1" required>
          <label for="lanche">Lanche</label>
          <input type="radio" id="cat_Id" name="cat_Id" value="2" required>
          <label for="hot-dog">Hot-Dog</label>
          <input type="radio" id="cat_Id" name="cat_Id" value="3" required>
          <label for="porcao">Porção</label>
          <input type="radio" id="cat_Id" name="cat_Id" value="4" required>
          <label for="pizza">Pizza</label>
          <br>
          <div class="inputBox">
            <label>Descrição:</label>
            <textarea type="text" name="proDescricao" id="proDescricao" class="inputProd" rows="5" required></textarea>
          </div>
          <br>
          <div class="inputBox">
            <label>Foto:</label>
            <input type="file" name="proImagem" id="proImagem" class="inputProd">
          </div>
          <br>
          <input type="submit" name="submit" id="submit">
        </fieldset>
      </form>
    </div>
</body>
</html>