<?php

  // if(isset($_POST['submit'])){

  //   // print_r('Produto: ' . $_POST['proNome']);
  //   // print_r('<br>');
  //   // print_r('Preço: ' . $_POST['proPreco']);
  //   // print_r('<br>');
  //   // print_r('Tamanho: ' . $_POST['tam_Id']);
  //   // print_r('<br>');
  //   // print_r('Categoria: ' . $_POST['cat_Id']);
  //   // print_r('<br');
  //   // print_r('Descrição: ' . $_POST['proDescricao']);

  //   include_once('./acoes/conexao.php');

  //   $proNome = $_POST['proNome'];
  //   $proPreco = $_POST['proPreco'];
  //   $tam_Id = $_POST['tam_Id'];
  //   $cat_Id = $_POST['cat_Id'];
  //   $proDescricao = $_POST['proDescricao'];
  //   // $proImagem = $_FILES['proImagem'];

  //   $result = mysqli_query($conn, "INSERT INTO produtos(proNome,proPreco,tam_Id,cat_Id,proDescricao 
  //   VALUES ('$proNome','$proPreco','$tam_Id','$cat_Id','$proDescricao')");
  // }
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
      <form action="./acoes/cadastropro.php" method="post">
        <fieldset>
          <legend><b>Cadastro de Produtos</b></legend>
          <br>
          <div class="inputBox">
            <input type="text" name="proNome" id="proNome" class="inputProd" required>
            <label class="labelInput">Produto:</label>
          </div>
          <br>
          <div class="inputBox">
            <input type="text" name="proPreco" id="proPreco" class="inputProd" required>
            <label class="labelInput">Preço:</label>
          </div>
          <br>
          <p>Tamanho:</p>
          <select name="tam_id" id="tipo-select">
                <option value="" selected hidden disabled>Escolha uma opção</option>
                <option value="1">Pequena</option>   
                <option value="2">Média</option>  
                <option value="3">Grande</option>           
              </select>
          
          <br>
          <p>Categoria:</p>
          <select name="cat_Id" id="tipo-select">
                <option value="" selected hidden disabled>Escolha uma opção</option>
                <option value="1">Lanche</option>   
                <option value="2">Hot-Dog</option>  
                <option value="3">Porção</option> 
                <option value="4">Pizza</option>              
              </select>
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