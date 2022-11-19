<?php
  session_start();
  $id_estab = $_GET['id_estab'];
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
  //   // $est_Id = $_POST['est_Id'];
  //   // $proImagem = $_FILES['proImagem'];

  //   $result = mysqli_query($conn, "INSERT INTO produtos(proNome,proPreco,tam_Id,cat_Id,proDescricao) 
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
  <!-- <header>BuscaFood®</header> -->
  <header class="header">
    <div>
        <a href="../index.html" class="logo">
          <img src="./images/Logo.svg" alt="">
        </a>
    </div>
    <div id="logout" >
      <?php echo '<a href="listarprod.php?id_estab='.$id_estab.'">Cancelar</a>'; ?>
    </div>
  </header>

    <div class="box">
      <form action="./acoes/cadastropro.php?id_estab=<?php echo $id_estab?>" method="post" enctype="multipart/form-data">
        <fieldset>
          <legend><b>Cadastro de Produtos</b></legend>
          <br>

          <div class="inputBox">
            <input type="text" name="proNome" id="proNome" class="inputProd" required>
            <label class="labelInput">Produto:</label>
          </div>
          <br>

          <div class="inputBox">
            <input type="number" step=".01" name="proPreco" id="proPreco" class="inputProd" required>
            <label class="labelInput">Preço:</label>
          </div>
          <br>
          <div class="radioBtns">
            <h4>Tamanho:</h4>
            <ul class="btnsRadio">
              <li>
                <input type="radio" id="pequena" name="tam_Id" value="1" required>
                <label for="pequena">Pequena</label>
              </li>
              <li>
                <input type="radio" id="media" name="tam_Id" value="2" required>
                <label for="media">Média</label>
              </li>
              <li>
                <input type="radio" id="grande" name="tam_Id" value="3" required>
                <label for="grande">Grande</label>
              </li>
            </ul>
          </div>
          <br>
          <div class="radioBtns">
            <h4>Categoria:</h4>
            <ul class="btnsRadio">
              <li>
                <input type="radio" id="lanche" name="cat_Id" value="1" required>
                <label for="lanche">Lanche</label>
              </li>
              <li>
                <input type="radio" id="hot-dog" name="cat_Id" value="2" required>
                <label for="hot-dog">Hot-Dog</label>
              </li>
              <li>
                <input type="radio" id="porcao" name="cat_Id" value="3" required>
                <label for="porcao">Porção</label>
              </li>
              <li>
                <input type="radio" id="pizza" name="cat_Id" value="4" required>
                <label for="pizza">Pizza</label>
              </li>
            </ul>
          </div>
          <br>

          <div class="inputBox">
            <label>Descrição:</label>
            <input type="text" name="proDescricao" id="proDescricao" class="inputProd" required></input>
          </div>
          <br>

          <div class="inputBox">
            <label>Foto:</label>
            <input type="file" name="proImagem" id="proImagem" class="inputProd">
          </div>
          <br>

          <input type="submit" name="submit" id="submit" value="Cadastrar">
        </fieldset>
      </form>
    </div>
</body>
</html>