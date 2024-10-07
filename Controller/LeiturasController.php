<?php

if (!isset($_SESSION)) {
    session_start();
}
class LeiturasController
{

    //--- Método Inserir---//
//função de instanciar um objeto da classe Leituras e inserir os dados em sua respectiva tabela //

    public function inserir($idusuario, $titulo, $quantidade_volumes, $volumes_lidos, $status_leitura)
    {
        require_once '../Model/Leituras.php';
        $leituras = new Leituras();
        $leituras->setIdUsuario($idusuario);
        $leituras->setTitulo($titulo);
        $leituras->setQuantidade_volumes($quantidade_volumes);
        $leituras->setVolumes_lidos($volumes_lidos);
        $leituras->setStatus_leitura($status_leitura);
        $resultado = $leituras->inserirBD();
        return $resultado;
    }

    //--- Método Editar---//
//função de instanciar um objeto da classe Leituras e realizar o update dos dados em sua respectiva tabela //

    public function editar($id, $titulo, $quantidade_volumes, $volumes_lidos, $status_leitura)
    {
        require_once '../Model/Leituras.php';
        $leituras = new Leituras();
        $leituras->setId($id);
        $leituras->setTitulo($titulo);
        $leituras->setQuantidade_volumes($quantidade_volumes);
        $leituras->setVolumes_lidos($volumes_lidos);
        $leituras->setStatus_leitura($status_leitura);
        $resultado = $leituras->editarBD();
        return $resultado;
    }

    //--- Método Excluir---//
//realiza um delete de dados na tabela Leituras por meio de um parâmetro //

    public function remover($id)
    {
        require_once '../Model/Leituras.php';
        $leituras = new Leituras();
        $resultado = $leituras->excluirBD($id);
        return $resultado;
    }

    //--- Método Gerar Lista---//
//Com esse método e uma instância de Leituras, teremos disponível a lista de leituras do usuário logado//    

    public function gerarLista($idusuario)
    {
        require_once '../Model/Leituras.php';
        $leituras = new Leituras();
        return $resultado = $leituras->listarLeituras($idusuario);
    }

    //--- Método Carregar Edição---//
//Com esse método e uma instância de Leituras, iremos carregar a leitura selecionada para edição na Lista//    

    public function carregarEdicao($id)
    {
        require_once '../Model/Leituras.php';
        $leituras = new Leituras();
        return $resultado = $leituras->editarLeituras($id);
    }
}
?>