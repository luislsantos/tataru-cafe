<?php
class ProdutoCarrinho {
    public $id;
    public $nome;
    public $descricao;
    public $preco_unitario;
    public $imagem;
    public $quantidade;
    
    public function __construct($id, $nome,$descricao, $preco_unitario, $imagem, $quantidade) {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->preco_unitario = $preco_unitario;
        $this ->imagem = $imagem;
        $this->quantidade = $quantidade;
    }
}
?>