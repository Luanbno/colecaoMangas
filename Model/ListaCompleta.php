<?php
class ListaCompleta
{
    private $id;
    private $idusuario;
    private $titulo;
    private $autor;
    private $volume;
    private $editora;
    private $edicao;
    private $colecao;

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

    //Autor

    public function setAutor($autor)
    {
        $this->autor = $autor;
    }
    public function getAutor()
    {
        return $this->autor;
    }

    //Volume

    public function setVolume($volume)
    {
        $this->volume = $volume;
    }
    public function getVolume()
    {
        return $this->volume;
    }

    //Editora

    public function setEditora($editora)
    {
        $this->editora = $editora;
    }
    public function getEditora()
    {
        return $this->editora;
    }

    //Edição

    public function setEdicao($edicao)
    {
        $this->edicao = $edicao;
    }
    public function getEdicao()
    {
        return $this->edicao;
    }

    //Coleção

    public function setColecao($colecao)
    {
        $this->colecao = $colecao;
    }
    public function getColecao()
    {
        return $this->colecao;
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

        $sql = "INSERT INTO lista_de_mangas (idusuario, titulo, autor, volume, editora, edicao, colecao)
        VALUES ('" . $this->idusuario . "', '" . $this->titulo . "', '" . $this->autor . "', '" . $this->volume . "', '" . $this->editora . "', '" . $this->edicao . "', '" . $this->colecao . "')";

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

        $sql = "UPDATE lista_de_mangas SET titulo = '" . $this->titulo . "', autor = '" . $this->autor . "', volume = '" . $this->volume . "', 
        editora = '" . $this->editora . "', edicao = '" . $this->edicao . "', colecao = '" . $this->colecao . "' 
        WHERE id = '" . $this->id . "'";

        if ($conn->query($sql) === TRUE) {
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

        $sql = "DELETE FROM lista_de_mangas WHERE id = '" . $id . "';";

        if ($conn->query($sql) === TRUE) {
            $this->id = mysqli_insert_id($conn);
            $conn->close();
            return TRUE;
        } else {
            $conn->close();
            return FALSE;
        }
    }

    // Codificação do Método ListarMangas

    public function listarMangas($idusuario)
    {
        require_once "ConexaoBD.php";
        $con = new ConexaoBD();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM lista_de_mangas WHERE idusuario = '" . $idusuario . "' ORDER BY colecao";
        $re = $conn->query($sql);
        $conn->close();
        return $re;
    }

    // Codificação do Método EditarMangá

    public function editarManga($id)
    {
        require_once "ConexaoBD.php";
        $con = new ConexaoBD();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM lista_de_mangas WHERE id = '" . $id . "'";
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

        $sql = "SELECT * FROM total_mangas WHERE idusuario = '" . $idusuario . "'";
        $re = $conn->query($sql);
        $conn->close();
        return $re;
    }
}