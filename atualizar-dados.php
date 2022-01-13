<?php
require_once "model/Livro.php";

if(isset($_GET["id"])){
    $livro = Livro::retornarPorId($_GET["id"]);
    //print_r($feijao);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Cadastro Livro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet" type="text/css" />
  </head>

  <body class="rounded mt-2 bg-dark">
    <?php
    include "inc/header.php";
    ?>
    <main class="bg-light container rounded text-dark" >
    <form action="ws/salvar-livro.php" class="p-4" >
       <h3>Cadastro de Livro</h3>
        <div class="d-block">
          <div >
            <label for="nome">Título do Livro</label>
            <input type="text" id="nome" name="nome" placeholder="Título do Livro" class="input mr-3" autofocus="autofocus" value="<?= isset($livro)? $livro->getNome() : ''; ?>" required >
          </div>

          <div >
            <label for="autor" class="mt-2 ml-5">Autor</label>
            <input type="text" id="autor" name="autor" placeholder="Autor" class="input " value="<?= isset($livro)? $livro->getAutor() : ''; ?>" required>
          </div>
        </div>

        <div >
          <div >
            <label for="editora" class="ml-5">Editora</label>
            <input type="text" id="editora" name="editora" placeholder="Editora" class="input " value="<?= isset($livro)? $livro->getEditora() : ''; ?>" required>
          </div>

          <div >
            <label for="quantidade"> Quantidade disponível</label>
            <input type="number" id="quantidade" name="quantidade" placeholder="Quantidade disponível" class="input mr-1" value="<?= isset($livro)? $livro->getQuantidade() : ''; ?>" required>
          </div>

          <div >
            <label for="genero" class="ml-5">Genero</label>
            <input type="text" id="genero" name="genero" placeholder="Gênero do Livro" class="input" value="<?= isset($livro)? $livro->getGenero() : ''; ?>" required>
          </div>
      </div>
        </div>
        <input type="hidden" name="id" value="<?= isset($livro)? $livro->getId() : ''; ?>">
        <input type="submit" value="Atualizar Livro" class="bg-success mt-2" >
      </form>
    </main>
    <?php
    include "inc/footer.php";
    ?>
    <!-- Modal: Pano de fundo estático-->
    <?php
    include "inc/modal.php";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
     
  </body>
</html>