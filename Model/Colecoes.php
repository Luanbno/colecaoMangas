<?php
class Colecoes
{
    private $id;
    private $idusuario;
    private $nome;
    private $quantidade_mangas;

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


    //Nome

    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function getNome()
    {
        return $this->nome;
    }

    //Quantidade Mangás

    public function setQuantidade_mangas($quantidade_mangas)
    {
        $this->quantidade_mangas = $quantidade_mangas;
    }
    public function getQuantidade_mangas()
    {
        return $this->quantidade_mangas;
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

        $sql = "INSERT INTO colecoes (idusuario, nome, quantidade_mangas)
        VALUES ('" . $this->idusuario . "', '" . $this->nome . "', '" . $this->quantidade_mangas . "')";

        if ($conn->query($sql) == TRUE) {
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

        $sql = "UPDATE colecoes SET nome = '" . $this->nome . "', quantidade_mangas = '" . $this->quantidade_mangas . "' 
        WHERE id = '" . $this->id . "'";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return TRUE;
        } else {
            $conn->close();
            return FALSE;
        }
    }

    //Codificação do Método ExcluirBD

    public function excluirBD($id)
    {
        require_once "ConexaoBD.php";
        $con = new ConexaoBD();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }

        $sql = "DELETE FROM colecoes WHERE id = '" . $id . "';";

        if ($conn->query($sql) === TRUE) {
            $this->id = mysqli_insert_id($conn);
            $conn->close();
            return TRUE;
        } else {
            $conn->close();
            return FALSE;
        }
    }

    // Codificação do Método ListarColecoes

    public function listarColecoes($idusuario)
    {
        require_once "ConexaoBD.php";
        $con = new ConexaoBD();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM colecoes WHERE idusuario = '" . $idusuario . "'";
        $re = $conn->query($sql);
        $conn->close();
        return $re;
    }

    // Codificação do Método EditarColecoes

    public function editarColecoes($id)
    {
        require_once "ConexaoBD.php";
        $con = new ConexaoBD();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM colecoes WHERE id = '" . $id . "'";
        $re = $conn->query($sql);
        $conn->close();
        return $re;
    }

    public function contarColecoes($idusuario)
    {
        require_once "ConexaoBD.php";
        $con = new ConexaoBD();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }

        $sql = "SELECT COUNT(*) FROM colecoes WHERE idusuario = '" . $idusuario . "'";
        $re = $conn->query($sql);
        $conn->close();
        return $re;
    }
}