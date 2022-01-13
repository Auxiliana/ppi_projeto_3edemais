<?php

require_once "Conexao.php";
class Livro{
    private $id;
    private $nome;
    private $autor;
    private $editora;
    private $quantidade;
    private $genero;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
        return $this;
    }

    public function getAutor(){
        return $this->autor;
    }
    public function setAutor($autor){
        $this->autor = $autor;
        return $this;
    }

    public function getEditora(){
        return $this->editora;
    }
    public function setEditora($editora){
        $this->editora = $editora;
        return $this;
    }

    public function getQuantidade(){
        return $this->quantidade;
    }
    public function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
        return $this;
    }

    public function getGenero(){
        return $this->genero;
    }
    public function setGenero($genero){
        $this->genero = $genero;
        return $this;
    }

    public function salvar(){
        //$c = new Conexao();
        //$c->getConexao();
        $tabela = "livros";
        $colunas = "nome, autor, editora, quantidade, genero";
        $valores = "'". $this->nome ."', '". $this->autor . "', '". $this->editora ."', ". $this->quantidade .", '". $this->genero ."'";
        Conexao::insert($tabela, $colunas, $valores);
    }

    public function atualizar(){
        $tabela = "livros";
        $parametros = "nome='". $this->nome ."', 
        autor='". $this->autor ."', 
        editora='". $this->editora ."', 
        quantidade=". $this->quantidade .", 
        genero='". $this->genero ."'";
        Conexao::update($tabela, $parametros, $this->id);
    }

    public static function retornarTodos(){
        $tabela = "livros";
        $colunas = "id, nome, autor, editora, quantidade, genero";

        $dados = Conexao::select($tabela, $colunas);
        $livros = [];
        foreach($dados as $d){
            $livro = new Livro();
            $livro->id = $d["id"];
            $livro->nome = $d["nome"];
            $livro->autor = $d["autor"];
            $livro->editora = $d["editora"];
            $livro->quantidade = $d["quantidade"];
            $livro->genero = $d["genero"];
            $livros[] = $livro;
        }
        return $livros;
    }

    public static function retornarPorId($id){
        $tabela = "livros";
        $colunas = "id, nome, autor, editora, quantidade, genero";

        $dados = Conexao::selectById($tabela, $colunas, $id);
        foreach($dados as $d){
            $livro = new Livro();
            $livro->id = $d["id"];
            $livro->nome = $d["nome"];
            $livro->autor = $d["autor"];
            $livro->editora = $d["editora"];
            $livro->quantidade = $d["quantidade"];
            $livro->genero = $d["genero"];
            return $livro;
        }
        return null;
    }

    public static function deletar($id){
        Conexao::delete("livros", $id);
    }
}