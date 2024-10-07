<?php
class Leituras
{
    private $id;
    private $idusuario;
    private $titulo;
    private $quantidade_volumes;
    private $volumes_lidos;
    private $status_leitura;

    //ID

    public function setID($id)
    {
        $this->id = $id;
    }
    public function getID()
    {
        return $this->id;
    }

    //IdUsuario
    public function setIdUsuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }
    public function getIdUsuario()
    {
        return $this->idusuario;
    }


    //Título

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }

    //Quantidade de Volumes

    public function setQuantidade_volumes($quantidade_volumes)
    {
        $this->quantidade_volumes = $quantidade_volumes;
    }
    public function getQuantidade_volumes()
    {
        return $this->quantidade_volumes;
    }

    //Volumes Lidos

    public function setVolumes_lidos($volumes_lidos)
    {
        $this->volumes_lidos = $volumes_lidos;
    }
    public function getVolumes_lidos()
    {
        return $this->volumes_lidos;
    }

    //Status da Leitura

    public function setStatus_leitura($status_leitura)
    {
        $this->status_leitura = $status_leitura;
    }
    public function getStatus_leitura()
    {
        return $this->status_leitura;
    }

    //Codificação do Método InserirBD

    public function inserirBD()
    {
        require_once "ConexaoBD.php";
        $con = new ConexaoBD();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO leituras (idusuario, titulo, quantidade_volumes, volumes_lidos, status_leitura)
        VALUES ('" . $this->idusuario . "', '" . $this->titulo . "', '" . $this->quantidade_volumes . "', '" . $this->volumes_lidos . "', '" . $this->status_leitura . "')";

        if ($conn->query($sql) === TRUE) {
            $this->id = mysqli_insert_id($conn);
            $conn->close();
            return TRUE;
        } else {
            $conn->close();
            return FALSE;
        }
    }


    //Codificação do Método EditarBD

    public function editarBD()
    {
        require_once "ConexaoBD.php";
        $con = new ConexaoBD();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }

        $sql = "UPDATE leituras SET titulo = '" . $this->titulo . "', quantidade_volumes = '" . $this->quantidade_volumes . "', 
        volumes_lidos = '" . $this->volumes_lidos . "', status_leitura = '" . $this->status_leitura . "'
        WHERE id = '" . $this->id . "'";

        if ($conn->query($sql) === TRUE) {
            $this->id = mysqli_insert_id($conn);
            $conn->close();
            return TRUE;
        } else {
            $conn->close();
            return FALSE;
        }
    }

    //Codificação do Método InserirBD

    public function excluirBD($id)
    {
        require_once "ConexaoBD.php";
        $con = new ConexaoBD();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }

        $sql = "DELETE FROM leituras WHERE id = '" . $id . "';";

        if ($conn->query($sql) === TRUE) {
            $this->id = mysqli_insert_id($conn);
            $conn->close();
            return TRUE;
        } else {
            $conn->close();
            return FALSE;
        }
    }

    // Codificação do Método ListarLeituras

    public function listarLeituras($idusuario)
    {
        require_once "ConexaoBD.php";
        $con = new ConexaoBD();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM leituras WHERE idusuario = '" . $idusuario . "'";
        $re = $conn->query($sql);
        $conn->close();
        return $re;
    }

    // Codificação do Método EditarLeituras

    public function editarLeituras($id)
    {
        require_once "ConexaoBD.php";
        $con = new ConexaoBD();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM leituras WHERE id = '" . $id . "'";
        $re = $conn->query($sql);
        $conn->close();
        return $re;
    }

}