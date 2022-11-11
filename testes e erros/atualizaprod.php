<?php

  if(!empty($_GET['id'])){

    // print_r('Produto: ' . $_POST['proNome']);
    // print_r('<br>');
    // print_r('Preço: ' . $_POST['proPreco']);
    // print_r('<br>');
    // print_r('Tamanho: ' . $_POST['tam_Id']);
    // print_r('<br>');
    // print_r('Categoria: ' . $_POST['cat_Id']);
    // print_r('<br');
    // print_r('Descrição: ' . $_POST['proDescricao']);

    include_once('./acoes/conexao.php');

    $id = $_GET['id_prod'];

    $sqlSelect = "SELECT * FROM produtos WHERE proId=$id";

    $result = $conn -> query($sqlSelect);

    print_r($result);
    if($result -> num_rows > 0){

      while($user_data = mysqli_fetch_assoc($result)){
        // $id = $user_data['proId'];
        $proNome = $user_data['proNome'];
        $proPreco = $user_data['proPreco'];
        $tam_Id = $user_data['tam_Id'];
        $cat_Id = $user_data['cat_Id'];
        $proDescricao = $user_data['proDescricao'];
      }
      // print_r($proNome);
    }else{
      header('Location: produto.php');
    }

  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BuscaFood®</title>
  <link rel="stylesheet" href="./css/atualiza.css">
</head>
<body>
<header>BuscaFood®</header>
    <div class="box">
      <form action="./acoes/saveEdit.php?id_prod='.$id.'" method="POST">
        <fieldset>
          <legend><b>Atualização de Produtos</b></legend>
          <br>
          <div class="inputBox">
            <input type="text" name="proNome" id="proNome" class="inputProd" value="<?php echo $proNome?>" required>
            <label class="labelInput">Produto:</label>
          </div>
          <br>
          <div class="inputBox">
            <input type="text" name="proPreco" id="proPreco" class="inputProd" value="<?php echo $proPreco?>"  required>
            <label class="labelInput">Preço:</label>
          </div>
          <br>
          <p>Tamanho:</p>
          <input type="radio" id="pequena" name="tam_Id" value="1" <?php echo ($tam_Id == '1') ? 'checked' : '' ?> required>
          <label for="pequena">Pequena</label>
          <input type="radio" id="media" name="tam_Id" value="2" <?php echo ($tam_Id == '2') ? 'checked' : '' ?> required>
          <label for="media">Média</label>
          <input type="radio" id="grande" name="tam_Id" value="3" <?php echo ($tam_Id == '3') ? 'checked' : '' ?> required>
          <label for="grande">Grande</label>
          <!-- <select name="tam_Id" id="tipo-select">
                <option value="" selected hidden disabled>Escolha uma opção</option>
                <option value="1">Pequena</option>   
                <option value="2">Média</option>  
                <option value="3">Grande</option>           
              </select> -->
          
          <br>
          <p>Categoria:</p>
          <input type="radio" id="lanche" name="cat_Id" value="1" <?php echo ($cat_Id == '1') ? 'checked' : '' ?> required>
          <label for="lanche">Lanche</label>
          <input type="radio" id="hot-dog" name="cat_Id" value="2" <?php echo ($cat_Id == '2') ? 'checked' : '' ?> required>
          <label for="hot-dog">Hot-Dog</label>
          <input type="radio" id="porcao" name="cat_Id" value="3" <?php echo ($cat_Id == '3') ? 'checked' : '' ?> required>
          <label for="porcao">Porção</label>
          <input type="radio" id="pizza" name="cat_Id" value="4" <?php echo ($cat_Id == '4') ? 'checked' : '' ?> required>
          <label for="pizza">Pizza</label>
          <!-- <select name="cat_Id" id="tipo-select">
                <option value="" selected hidden disabled>Escolha uma opção</option>
                <option value="1">Lanche</option>   
                <option value="2">Hot-Dog</option>  
                <option value="3">Porção</option> 
                <option value="4">Pizza</option>              
              </select> -->
          <br>
          <div class="inputBox">
            <label>Descrição:</label>
            <input type="text" name="proDescricao" id="proDescricao" class="inputProd" rows="5" value="<?php echo $proDescricao?>"  required></input>
          </div>
          <br>
          <!-- <div class="inputBox">
            <label>Foto:</label>
            <input type="file" name="proImagem" id="proImagem" class="inputProd">
          </div> -->
          <br>
          <input type="hidden" name="id" value="<?php echo $id?>">
          <input type="submit" name="update" id="update" value="Atualizar">
        </fieldset>
      </form>
    </div>
</body>
</html>