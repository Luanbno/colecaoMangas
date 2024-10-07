<?php

if (!isset($_SESSION)) {
    session_start();
}

class SobreController {

    public function gerarContagemCol($idusuario)
    {
        require_once '../Model/Sobre.php';
        $colecoes = new Sobre();
        return $resultado = $colecoes->contarColecoes($idusuario);
    }

    //--- Método Gerar Lista---//
//Com esse método e uma instância de ListaCompleta, teremos disponível a lista completa de mangás do usuário logado//    

public function gerarContagemMan($idusuario)
{
    require_once '../Model/Sobre.php';
    $mangas = new Sobre();
    return $resultado = $mangas->contarMangas($idusuario);
}

}