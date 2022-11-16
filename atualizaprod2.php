<?php

  $id = $_GET['id'];
  if(!empty($_GET['id_prod'])){

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
        // print_r($proNome);
        
    }else{
        header('Location: listar.php');
    }

    

//     $id = $_GET['id_prod'];

//     $sqlSelect = "SELECT * FROM produtos WHERE proId=$id";

//     $result = $conn -> query($sqlSelect);

//     // print_r($result);
//     if($result -> num_rows > 0){

//       while($user_data = mysqli_fetch_assoc($result)){
//         // $id = $user_data['proId'];
//         $proNome = $user_data['proNome'];
//         $proPreco = $user_data['proPreco'];
//         $tam_Id = $user_data['tam_Id'];
//         $cat_Id = $user_data['cat_Id'];
//         $proDescricao = $user_data['proDescricao'];
//       }
//       // print_r($proNome);
//     }else{
//       header('Location: produto.php');
//     }

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
      <!-- <header>BuscaFood®</header> -->
      <header class="header">
          <a href="index.html" class="logo"><img src="./images/Logo.svg" alt=""></a>
      </header>
      <div class="box">
        <form action="./acoes/saveEdit2.php?id_prod=<?php echo $id_prod?>" method="POST">
          <fieldset>
            <legend><b>Atualização de Produtos</b></legend>
            <br>
            <div class="inputBox">
              <input type="text" name="proNome" id="proNome" class="inputProd" value="<?php echo $proNome ?>" required>
              <label class="labelInput">Produto:</label>
            </div>
            <br>
            <div class="inputBox">
              <input type="text" name="proPreco" id="proPreco" class="inputProd" value="<?php echo $proPreco ?>" required>
              <label class="labelInput">Preço:</label>
            </div>
            <br>
            <p>Tamanho:</p>
              <input type="radio" id="pequena" name="tam_Id" value="1" <?php echo ($tam_Id == '1') ? 'checked' : ''?> required>
              <label for="pequena">Pequena</label>
              <input type="radio" id="media" name="tam_Id" value="2" <?php echo ($tam_Id == '2') ? 'checked' : ''?> required>
              <label for="media">Média</label>
              <input type="radio" id="grande" name="tam_Id" value="3" <?php echo ($tam_Id == '3') ? 'checked' : ''?> required>
              <label for="grande">Grande</label>
            <br>
            <p>Categoria:</p>
              <input type="radio" id="lanche" name="cat_Id" value="1" <?php echo ($tam_Id == '1') ? 'checked' : ''?> required>
              <label for="lanche">Lanche</label>
              <input type="radio" id="hot-dog" name="cat_Id" value="2" <?php echo ($tam_Id == '2') ? 'checked' : ''?> required>
              <label for="hot-dog">Hot-Dog</label>
              <input type="radio" id="porcao" name="cat_Id" value="3" <?php echo ($tam_Id == '3') ? 'checked' : ''?> required>
              <label for="porcao">Porção</label>
              <input type="radio" id="pizza" name="cat_Id" value="4" <?php echo ($tam_Id == '4') ? 'checked' : ''?> required>
              <label for="pizza">Pizza</label>
            <br>
            <div class="inputBox">
              <label>Descrição:</label>
              <input type="text" name="proDescricao" id="proDescricao" class="inputProd" value="<?php echo $proDescricao ?>"  required></input>
            </div>
            <br>
            <input type="hidden" name="id" value="<?php echo $id?>">
            <input type="submit" name="update" id="update" value="Atualizar">
          </fieldset>
        </form>
      </div>
    </body>
</html>