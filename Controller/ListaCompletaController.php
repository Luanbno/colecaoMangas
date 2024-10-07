<?php

if (!isset($_SESSION)) {
    session_start();
}
class ListaCompletaController
{

    //--- Método Inserir---//
//função de instanciar um objeto da classe ListaCompleta e inserir os dados em sua respectiva tabela //

    public function inserir($idusuario, $titulo, $autor, $volume, $editora, $edicao, $colecao)
    {
        require_once '../Model/ListaCompleta.php';
        $lista = new ListaCompleta();
        $lista->setIdUsuario($idusuario);
        $lista->setTitulo($titulo);
        $lista->setAutor($autor);
        $lista->setVolume($volume);
        $lista->setEditora($editora);
        $lista->setEdicao($edicao);
        $lista->setColecao($colecao);
        $resultado = $lista->inserirBD();
        return $resultado;
    }

    //--- Método Editar---//
//função de instanciar um objeto da classe ListaCompleta e realizar o update dos dados em sua respectiva tabela //

    public function editar($id, $titulo, $autor, $volume, $editora, $edicao, $colecao)
    {
        require_once '../Model/ListaCompleta.php';
        $lista = new ListaCompleta();
        $lista->setId($id);
        $lista->setTitulo($titulo);
        $lista->setAutor($autor);
        $lista->setVolume($volume);
        $lista->setEditora($editora);
        $lista->setEdicao($edicao);
        $lista->setColecao($colecao);
        $resultado = $lista->editarBD();
        return $resultado;
    }

    //--- Método Excluir---//
//realiza um delete de dados na tabela ListaCompleta por meio de um parâmetro //

    public function remover($id)
    {
        require_once '../Model/ListaCompleta.php';
        $lista = new ListaCompleta();
        $resultado = $lista->excluirBD($id);
        return $resultado;
    }

    //--- Método Gerar Lista---//
//Com esse método e uma instância de ListaCompleta, teremos disponível a lista completa de mangás do usuário logado//    

    public function gerarLista($idusuario)
    {
        require_once '../Model/ListaCompleta.php';
        $lista = new ListaCompleta();
        return $resultado = $lista->listarMangas($idusuario);
    }

    //--- Método Carregar Edição---//
//Com esse método e uma instância de ListaCompleta, iremos carregar o mangá selecionada para edição na Lista//    

    public function carregarEdicao($id)
    {
        require_once '../Model/ListaCompleta.php';
        $manga = new ListaCompleta();
        return $resultado = $manga->editarManga($id);
    }

    //--- Método Gerar Lista---//
//Com esse método e uma instância de ListaCompleta, teremos disponível a lista completa de mangás do usuário logado//    

public function gerarContagem($idusuario)
{
    require_once '../Model/ListaCompleta.php';
    $lista = new ListaCompleta();
    return $resultado = $lista->contarMangas($idusuario);
}
}
?>