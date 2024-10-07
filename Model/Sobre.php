<?php

class Sobre
{
    private $total_colecoes;
    private $total_mangas;

    //Total Coleções

    public function setTotal_colecoes($total_colecoes)
    {
        $this->total_colecoes = $total_colecoes;
    }
    public function getTotal_colecoes()
    {
        return $this->total_colecoes;
    }

    //Total Mangás

    public function setTotal_mangas($total_mangas)
    {
        $this->total_mangas = $total_mangas;
    }
    public function getTotal_mangas()
    {
        return $this->total_mangas;
    }

    public function contarColecoes($idusuario)
    {
        require_once "ConexaoBD.php";
        $con = new ConexaoBD();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }

        $sql = "SELECT COUNT(*) as totalColecoes FROM colecoes WHERE idusuario = '" . $idusuario . "'";
        $re = $conn->query($sql);
        $conn->close();
        return $re;
    }

    public function contarMangas($idusuario)
    {
        require_once "ConexaoBD.php";
        $con = new ConexaoBD();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }

        $sql = "SELECT COUNT(*) as totalMangas FROM lista_de_mangas WHERE idusuario = '" . $idusuario . "'";
        $re = $conn->query($sql);
        $conn->close();
        return $re;
    }

}
?>