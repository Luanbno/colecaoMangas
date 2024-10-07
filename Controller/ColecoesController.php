<?php

if (!isset($_SESSION)) {
    session_start();
}
class ColecoesController
{

    //--- Método Inserir---//
//função de instanciar um objeto da classe Colecoes e inserir os dados em sua respectiva tabela //

    public function inserir($idusuario, $nome, $quantidade_mangas)
    {
        require_once '../Model/Colecoes.php';
        $colecoes = new Colecoes();
        $colecoes->setIdUsuario($idusuario);
        $colecoes->setNome($nome);
        $colecoes->setQuantidade_mangas($quantidade_mangas);
        $resultado = $colecoes->inserirBD();
        return $resultado;
    }

    //--- Método Editar---//
//função de instanciar um objeto da classe Colecoes e realizar o update dos dados em sua respectiva tabela //
    public function editar($id, $nome, $quantidade_mangas)
    {
        require_once '../Model/Colecoes.php';
        $colecoes = new Colecoes();
        $colecoes->setID($id);
        $colecoes->setNome($nome);
        $colecoes->setQuantidade_mangas($quantidade_mangas);
        $resultado = $colecoes->editarBD();
        return $resultado;
    }

    //--- Método Excluir---//
//realiza um delete de dados na tabela coleções por meio de um parâmetro //

    public function remover($id)
    {
        require_once '../Model/Colecoes.php';
        $colecoes = new Colecoes();
        $resultado = $colecoes->excluirBD($id);
        return $resultado;
    }

    //--- Método Gerar Lista---//
//Com esse método e uma instância de Leituras, teremos disponível a lista de leituras do usuário logado//    

    public function gerarLista($idusuario)
    {
        require_once '../Model/Colecoes.php';
        $colecoes = new Colecoes();
        return $resultado = $colecoes->listarColecoes($idusuario);
    }

    //--- Método Carregar Edição---//
//Com esse método e uma instância de Colecoes, iremos carregar a coleção selecionada para edição na Lista//    

    public function carregarEdicao($id)
    {
        require_once '../Model/Colecoes.php';
        $colecao = new Colecoes();
        return $resultado = $colecao->editarColecoes($id);
    }

    //--- Método Gerar Lista---//
//Com esse método e uma instância de Leituras, teremos disponível a lista de leituras do usuário logado//    

public function gerarContagem($idusuario)
{
    require_once '../Model/Colecoes.php';
    $colecoes = new Colecoes();
    return $resultado = $colecoes->contarColecoes($id);
}

}
