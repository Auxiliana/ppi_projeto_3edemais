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
    <title>Catálogo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    </head>
    <body class="rounded mt-2 ">
    <?php
    include "inc/header.php";
    ?>

<main class="container table table-striped " >
    <table class="tabela">
        <thead class="thead-dark">
            <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Autor</th>
            <th>Editora</th>
            <th>Quantidade disponível</th>
            <th>Gênero</th>
            <th>Editar</th>
            <th>Excluir</th>
            </tr>
        </thead>
        <?php
    $livros = Livro::retornarTodos();
    //print_r($feijoes);
    foreach($livros as $l):
    ?>
      <tr>
          <td> <?php echo $l->getId(); ?> </td>
          <td> <?= $l->getNome(); ?> </td>
          <td> <?= $l->getAutor(); ?> </td>
          <td> <?= $l->getEditora(); ?> </td>
          <td> <?= $l->getQuantidade(); ?> </td>
          <td> <?= $l->getGenero(); ?> </td>
          <td>
      <a
      href="atualizar-dados.php?id=<?= $l->getId(); ?>"
      class="btn btn-secondary material-icons">
          edit
      </a>
          </td>
          <td>
      <a
      href="ws/deletar-livro.php?id=<?= $l->getId(); ?>"
      class="btn btn-danger material-icons" onclick="myFunction()">
          delete
      </a>
          </td>
      </tr>
    <?php 
    endforeach;
    ?>
    </table>
</main>
<script>
function myFunction() {
  let text = <?= $l->getId(); ?>;
  var resultado = confirm("Deseja excluir o item: " + text + " ?");
        if (resultado == true) {
            itens.removeChild(itens[indice]);
            alert("O item " + text + " será excluído da lista!");    
        }
        else{
            alert("Você desistiu de excluir o item " + text + " da lista!");
        }
}
    </script>
  </body>
</html>