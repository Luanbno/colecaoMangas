<?php
class Acesso
{

    private $id;
    private $nome;
    private $usuario;
    private $senha;

    //ID

    public function setID($id)
    {
        $this->id = $id;
    }
    public function getID()
    {
        return $this->id;
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

    //Usuario

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }
    public function getUsuario()
    {
        return $this->usuario;
    }

    //Senha

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
    public function getSenha()
    {
        return $this->senha;
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

        $sql = "INSERT INTO acesso (nome, usuario, senha)
        VALUES ('" . $this->nome . "', '" . $this->usuario . "', '" . $this->senha . "')";

        if ($conn->query($sql) === TRUE) {
            $this->id = mysqli_insert_id($conn);
            $conn->close();
            return TRUE;
        } else {
            $conn->close();
            return FALSE;
        }
    }

        //Codificção do Método carregarUsuario

        public function carregarUsuario($usuario)
        {
            require_once "ConexaoBD.php";
            $con = new ConexaoBD();
            $conn = $con->conectar();
            if ($conn->connect_error) {
                die("Connection Failed: " . $conn->connect_error);
            }
            
            $sql = " SELECT * FROM acesso WHERE usuario = '$usuario'";
            $re = $conn->query($sql);
            $r = $re->fetch_object();
            if ($re != null) {
                $this->id = $r->id;
                $this->nome = $r->nome;
                $this->usuario = $r->usuario;
                $this->senha = $r->senha;
                $conn->close();
                return true;
            } else {
                $conn->close();
                return false;
            }
        }

}


