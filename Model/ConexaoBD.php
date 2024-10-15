<?php
class ConexaoBD
{
    private $serverName = "localhost";
    private $userName = "root";
    private $password = ""; // sua senha
    private $dbName = "colecao_mangas";

    public function conectar()
    {
        $conn = new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);
        $conn->set_charset("utf8mb4");
        return $conn;

    }
}

?>
