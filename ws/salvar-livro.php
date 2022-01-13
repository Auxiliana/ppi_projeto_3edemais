<pre>
    <?php
    require_once "../model/Livro.php";
    print_r($_GET);

    $novoLivro = new Livro();

    $novoLivro
        ->setNome($_GET["nome"])
        ->setAutor($_GET["autor"])
        ->setEditora($_GET["editora"])
        ->setQuantidade($_GET["quantidade"])
        ->setGenero($_GET["genero"])
        ->setId($_GET["id"]);
        
    print_r($novoLivro);

    if($novoLivro->getId() == ''){
        $novoLivro->salvar();
    }
    else{
        $novoLivro->atualizar();
        header("Location: ../catalogo.php");
    }
    header("Location: ../catalogo.php");
    ?>
</pre>